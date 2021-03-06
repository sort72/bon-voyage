<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Helpers\FlightHelper;
use App\Http\Requests\BookFlightRequest;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\ChangeSeatRequest;
use App\Http\Requests\SearchFlightRequest;
use App\Mail\BoardingPass;
use App\Models\Cart;
use App\Models\Card;
use App\Models\Destination;
use App\Models\Flight;
use App\Models\SearchSuggestion;
use App\Models\Ticket;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ExternalController extends Controller
{
    public function index()
    {
        $flights = Flight::with('destination.city','origin.city')->where('departure_time','>',Carbon::now())->orderBy('discount', 'desc')->orderBy('created_at', 'desc')->paginate(12);

        $recommendations = [];
        if(auth()->check()) {
            $interests = SearchSuggestion::where('user_id', auth()->user()->id)->get()->pluck('destination_id');
            if($interests)
                $recommendations = Flight::with('destination.city','origin.city')
                                    ->where('departure_time','>',Carbon::now())
                                    ->whereIn('destination_id', $interests)
                                    ->orderBy('discount', 'desc')->inRandomOrder()->get();
        }

        return view('welcome',compact('flights', 'recommendations'));
    }

    public function flights(SearchFlightRequest $request)
    {
        $found = 1;
        $flights = Flight::select('*');

        if($request->origin_id) $flights = $flights->where('origin_id', $request->origin_id);
        if($request->destination_id) $flights = $flights->where('destination_id', $request->destination_id);
        if($request->minimum_economy_class_price) $flights = $flights->where('economy_class_price', '>=', $request->minimum_economy_class_price);
        if($request->maximum_economy_class_price) $flights = $flights->where('economy_class_price', '<=', $request->maximum_economy_class_price);
        if($request->minimum_business_class_price) $flights = $flights->where('first_class_price', '>=', $request->minimum_business_class_price);
        if($request->maximum_business_class_price) $flights = $flights->where('first_class_price', '<=', $request->maximum_business_class_price);
        if($request->duration) $flights = $flights->whereRaw('TIMESTAMPDIFF(MINUTE, departure_time, arrival_time) <= ?', [$request->duration]);

        if($request->departure_time) $flights = $flights->whereBetween('departure_time', [DateHelper::addColombiaDifference($request->departure_time . ' 00:00:00'), DateHelper::addColombiaDifference($request->departure_time . ' 23:59:59')]);
        else $flights = $flights->where('departure_time', '>=', DateHelper::addColombiaDifference(now()->format('Y-m-d') . ' 00:00:00'));

        $flights = $flights->orderBy('departure_time', 'ASC')->get();

        if(!$flights->count()) $found = 0;

        $flights_back = [];

        if($request->has('back_time') && $request->back_time !='') {

            $flights_back = Flight::where('origin_id', $request->destination_id)
                            ->where('destination_id', $request->origin_id)
                            ->whereBetween('departure_time', [DateHelper::addColombiaDifference($request->back_time . ' 00:00:00'), DateHelper::addColombiaDifference($request->back_time . ' 23:59:59')])
                            ->get();

            if($request->departure_time) $flights = $flights->whereBetween('departure_time', [DateHelper::addColombiaDifference($request->departure_time . ' 00:00:00'), DateHelper::addColombiaDifference($request->departure_time . ' 23:59:59')]);
            else $flights = $flights->where('departure_time', '>=', DateHelper::addColombiaDifference(now()->format('Y-m-d') . ' 00:00:00'));

            if(!$flights_back->count()) $found = 0;
        }

        $results = [];

        foreach ($flights as $flight) {
            $key = $flight->origin_id . '_' . $flight->destination_id;
            if(!isset($results[$key])) $results[$key] = ['outbound_flights' => [], 'return_flights' => [], 'origin_name' => $flight->origin->city->name, 'destination_name' => $flight->destination->city->name];
            $results[$key]['outbound_flights'][] = $flight;
        }
        foreach ($flights_back as $flight) {
            $key = $flight->destination_id . '_' . $flight->origin_id;
            // if(!isset($results[$key])) $results[$key] = ['outbound_flights' => [], 'return_flights' => []];
            $results[$key]['return_flights'][] = $flight;
        }

        $departure_time = $request->departure_time;
        $back_time = $request->back_time;
        $adults_count = $request->adults_count;
        $kids_count = $request->kids_count;
        $flight_class = $request->flight_class;
        $origin_name = Destination::where('id', $request->origin_id)->with('city')->first()->city->name ?? 'A';
        $destination_name = Destination::where('id', $request->destination_id)->with('city')->first()->city->name ?? 'B';

        if(auth()->check())
        {
            $user = User::find(auth()->user()->id);
            if($request->origin_id) $user->suggestions()->firstOrCreate(['destination_id' => $request->origin_id]);
            if($request->destination_id) $user->suggestions()->firstOrCreate(['destination_id' => $request->destination_id]);
        }

        return view('pages.external.flights', compact('results', 'flights', 'flights_back', 'found', 'departure_time', 'back_time',
            'adults_count', 'kids_count', 'flight_class', 'origin_name', 'destination_name'));
    }

    public function booking(BookFlightRequest $request){
        $flight = Flight::find($request->flight_id);
        $inbound_flight = null;
        $one_person_value = $request->flight_class =='first_class' ? $flight->discounted_business : $flight->discounted_economy;
        if($request->has('inbound_flight_id') && $request->inbound_flight_id) {
            $inbound_flight = Flight::find($request->inbound_flight_id);

            if($flight->destination_id != $inbound_flight->origin_id || $inbound_flight->destination_id != $flight->origin_id) return redirect('external.index');

            $one_person_value += $request->flight_class =='first_class' ? $inbound_flight->discounted_business : $inbound_flight->discounted_economy;
        }

        return view('pages.external.booking', [
            'number_of_adults' => $request->adults_count,
            'number_of_children' => $request->kids_count,
            'passengers' => $request->passengers,
            'one_person_value' => $one_person_value,
            'class' => $request->flight_class,
            'flight' => $flight,
            'inbound_flight' => $inbound_flight,
        ]);
    }

    // Controlador de prueba
    public function bookingData(BookingRequest $request){
        // dump($request->all());

        $cart = Cart::firstOrCreate(['user_id' => Auth()->user()->id, 'status' => 'opened']);
        FlightHelper::createTickets($request, $cart, 'reserved');

        return redirect()->route('external.profile.booking-list')->with('success', 'Reserva realizada con ??xito. Tienes 24 horas para pagarla o ser?? cancelada.');
    }

    public function purchase(BookFlightRequest $request){
        $flight = Flight::find($request->flight_id);
        $cards = Card::where('client_id', Auth()->user()->id)->get();
        $inbound_flight = null;
        $one_person_value = $request->flight_class =='first_class' ? $flight->discounted_business : $flight->discounted_economy;
        if($request->has('inbound_flight_id') && $request->inbound_flight_id) {
            $inbound_flight = Flight::find($request->inbound_flight_id);

            if($flight->destination_id != $inbound_flight->origin_id || $inbound_flight->destination_id != $flight->origin_id) return redirect('external.index');

            $one_person_value += $request->flight_class =='first_class' ? $inbound_flight->discounted_business : $inbound_flight->discounted_economy;
        }

        return view('pages.external.purchase', [
            'number_of_adults' => $request->adults_count,
            'number_of_children' => $request->kids_count,
            'passengers' => $request->passengers,
            'one_person_value' => $one_person_value,
            'class' => $request->flight_class,
            'flight' => $flight,
            'inbound_flight' => $inbound_flight,
            'cards' => $cards
        ]);
    }

    // Controlador de prueba
    public function purchaseData(BookingRequest $request){
        // dump($request->all());

        $cart = Cart::firstOrCreate(['user_id' => Auth()->user()->id, 'status' => 'opened']);
        FlightHelper::createTickets($request, $cart, 'unpaid');

        return redirect()->route('external.profile.cart')->with('success', 'Vuelos a??adidos al carrito, realiza el pago ahora para asegurar tus asientos.');
    }

    public function checkin(Request $request)
    {
        $dni = "";
        $reservation_code = "";
        if(Auth()->check()) {
            $dni = Auth()->user()->dni;
            if($request->has('reservation')) {
                $reservation_code = $request->reservation;
                $dni = $request->dni;
            }
        };

        return view('pages.external.checkin', compact('dni', 'reservation_code'));
    }

    public function validateCheckin(Request $request)
    {
        $request->validate([
            'dni' => ['required'],
            'reservation_code' => ['required'],
        ]);

        $ticket = Ticket::where('passenger_document', $request->dni)
                        ->where('reservation_code', $request->reservation_code)
                        ->whereHas('flight', function(Builder $query) {
                            $query->where('departure_time', '<=', now()->addHours(24))
                                ->where('departure_time', '>', now()->subHour());
                        })
                        ->where('status', 'paid')
                        ->where('checkin_done', 0)
                        ->first();

        if(!$ticket)
            return redirect()->back()->with('danger', 'No se ha podido encontrar la reserva o no est?? paga.');
        else
            return redirect()->route('external.change-seat',$ticket);

    }

    public function activeBookings(){
        return view('pages.external.active-bookings', ['total_results' => 3]);
    }

    public function changeSeat(Ticket $ticket)
    {
        $flight = Flight::find($ticket->flight_id);
        $lettersI = ["A", "B", "C", "D", "E", "F", "G", "H"];
        $lettersN = ["A", "B", "C", "D", "E", "F"];
        $seats=[];

        if($flight->is_international)
        {
            foreach($lettersI as $letter){
                if($letter == 'A' || $letter == 'B')
                    $num_max = 33;
                else
                    $num_max = 32;

                for($i=1;$i<$num_max;$i++)
                {
                    $seat = $letter.$i;
                    $busy = Ticket::where('flight_id', $flight->id)->where('seat', $seat)->first();
                    $seats[$seat] = is_null($busy) ? 'free' : 'busy';
                }
            }
        }
        else
        {
            foreach($lettersN as $letter){
                for($i=1;$i<26;$i++)
                {
                    $seat = $letter.$i;
                    $busy = Ticket::where('flight_id', $flight->id)->where('seat', $seat)->first();
                    $seats[$seat] = is_null($busy) ? 'free' : 'busy';
                }
            }
        }

        return view('pages.external.seat',compact('flight','seats','ticket'));
    }

    public function updateSeat(ChangeSeatRequest $request)
    {
        $ticket = Ticket::find($request->ticket);
        $ticket->seat = $request->input('seat');
        $ticket->checkin_done = 1;
        $ticket->save();

        Mail::to($ticket->passenger_email)->send(new BoardingPass($ticket));
        return redirect()->route('external.profile.purchases-list')->with('success', 'Silla actualizada correctamente.');
    }

    public function confirmCheckin($id)
    {
        $ticket = Ticket::find($id);
        $ticket->checkin_done = 1;
        $ticket->save();

        Mail::to($ticket->passenger_email)->send(new BoardingPass($ticket));
        return redirect()->route('external.profile.purchases-list')->with('success', 'Check in realizado!.');
    }

    public function cancelExpired()
    {
        return Ticket::where('status', 'reserved')->where('created_at', '<', now()->subHours(24))->delete();
    }

    public function testBoardingPass(Request $request, Ticket $ticket)
    {
        // return PDF::loadView('boarding-pass-pdf', ['ticket' => $ticket])->stream();
        Mail::to($ticket->passenger_email)->send(new BoardingPass($ticket));
    }
}
