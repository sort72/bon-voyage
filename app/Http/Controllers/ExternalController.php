<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Helpers\FlightHelper;
use App\Http\Requests\BookFlightRequest;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\SearchFlightRequest;
use App\Models\Cart;
use App\Models\Card;
use App\Models\Destination;
use App\Models\Flight;
use App\Models\SearchSuggestion;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        $flights = Flight::where('origin_id', $request->origin_id)
                        ->where('destination_id', $request->destination_id)
                        ->whereBetween('departure_time', [DateHelper::addColombiaDifference($request->departure_time . ' 00:00:00'), DateHelper::addColombiaDifference($request->departure_time . ' 23:59:59')])
                        ->get();

        if(is_null($flights)) $found = 0;

        $flights_back = null;

        if($request->has('back_time') && $request->back_time !='') {

            $flights_back = Flight::where('origin_id', $request->destination_id)
                            ->where('destination_id', $request->origin_id)
                            ->whereBetween('departure_time', [DateHelper::addColombiaDifference($request->back_time . ' 00:00:00'), DateHelper::addColombiaDifference($request->back_time . ' 23:59:59')])
                            ->get();

            if(is_null($flights_back)) $found = 0;
        }

        $departure_time = $request->departure_time;
        $back_time = $request->back_time;
        $adults_count = $request->adults_count;
        $kids_count = $request->kids_count;
        $flight_class = $request->flight_class;
        $origin_name = Destination::where('id', $request->origin_id)->with('city')->first()->city->name;
        $destination_name = Destination::where('id', $request->destination_id)->with('city')->first()->city->name;

        if(auth()->check())
        {
            $user = User::find(auth()->user()->id);
            $user->suggestions()->firstOrCreate(['destination_id' => $request->origin_id]);
            $user->suggestions()->firstOrCreate(['destination_id' => $request->destination_id]);
        }

        return view('pages.external.flights', compact('flights', 'flights_back', 'found', 'departure_time', 'back_time',
            'adults_count', 'kids_count', 'flight_class', 'origin_name', 'destination_name'));
    }

    public function booking(BookFlightRequest $request){
        $flight = Flight::find($request->flight_id);
        $inbound_flight = null;
        if($request->has('inbound_flight_id') && $request->inbound_flight_id) {
            $inbound_flight = Flight::find($request->inbound_flight_id);

            if($flight->destination_id != $inbound_flight->origin_id || $inbound_flight->destination_id != $flight->origin_id) return redirect('external.index');
        }

        return view('pages.external.booking', [
            'number_of_adults' => $request->adults_count,
            'number_of_children' => $request->kids_count,
            'passengers' => $request->passengers,
            'one_person_value' => $request->flight_class =='first_class' ? $flight->first_class_price : $flight->economy_class_price,
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

        return redirect()->route('external.profile.booking-list')->with('success', 'Reserva realizada con éxito. Tienes 24 horas para pagarla o será cancelada.');
    }

    public function purchase(BookFlightRequest $request){
        $flight = Flight::find($request->flight_id);
        $cards = Card::where('client_id', Auth()->user()->id)->get();
        $inbound_flight = null;
        if($request->has('inbound_flight_id') && $request->inbound_flight_id) {
            $inbound_flight = Flight::find($request->inbound_flight_id);

            if($flight->destination_id != $inbound_flight->origin_id || $inbound_flight->destination_id != $flight->origin_id) return redirect('external.index');
        }

        return view('pages.external.purchase', [
            'number_of_adults' => $request->adults_count,
            'number_of_children' => $request->kids_count,
            'passengers' => $request->passengers,
            'one_person_value' => $request->flight_class =='first_class' ? $flight->first_class_price : $flight->economy_class_price,
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

        return redirect()->route('external.profile.cart')->with('success', 'Vuelos añadidos al carrito, realiza el pago ahora para asegurar tus asientos.');
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
                        ->first();

        if(!$ticket) return redirect()->back()->with('danger', 'No se ha podido encontrar la reserva o no está paga.');
        // Redireccionar a cambiar silla si no la ha cambiado.
    }

    public function activeBookings(){
        return view('pages.external.active-bookings', ['total_results' => 3]);
    }

    public function changeSeat()
    {
        $flight_info = FlightHelper::getTotalSeats(true);
        return view('pages.external.seat',compact('flight_info'));
    }

    public function updateSeat(Request $request)
    {

    }
}
