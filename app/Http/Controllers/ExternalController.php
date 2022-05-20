<?php

namespace App\Http\Controllers;

use App\Helpers\FlightHelper;
use App\Http\Requests\BookFlightRequest;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\SearchFlightRequest;
use App\Models\Cart;
use App\Models\Destination;
use App\Models\Flight;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ExternalController extends Controller
{
    public function index()
    {
        return view("pages.external.index");
    }

    public function flights(SearchFlightRequest $request)
    {
        $found = 1;

        $flights = Flight::where('origin_id', $request->origin_id)
                        ->where('destination_id', $request->destination_id)
                        ->whereBetween('departure_time', [$request->departure_time . ' 00:00:00', $request->departure_time . ' 23:59:59'])
                        ->get();

        if(is_null($flights)) $found = 0;

        $flights_back = null;

        if($request->has('back_time') && $request->back_time !='') {

            $flights_back = Flight::where('origin_id', $request->destination_id)
                            ->where('destination_id', $request->origin_id)
                            ->whereBetween('departure_time', [$request->back_time . ' 00:00:00', $request->back_time . ' 23:59:59'])
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
        $flight = Flight::find($request->flight_id);
        $price = $flight->economy_class_price;
        if($request->flight_class == 'first_class') {
            $price = $flight->first_class_price;
        }

        $inbound_flight = null;
        $inbound_flight_price = 0;
        if($request->inbound_flight_id) {
            $inbound_flight = Flight::find($request->inbound_flight_id);
            $inbound_flight_price = $inbound_flight->economy_class_price;
            if($request->flight_class == 'first_class') {
                $inbound_flight_price = $inbound_flight->first_class_price;
            }
        }

        foreach ($request->adult_dni as $key => $adult) {
            $data = [
                'flight_id' => $request->flight_id,
                'cart_id' => $cart->id,
                'type' => $request->flight_class,
                'reservation_code' => FlightHelper::generateReservationCode(),
                'status' => 'reserved',
                'price' => $price,
                'seat' => FlightHelper::getAvailableSeat($flight, $request->flight_class),
                'passenger_document' => $request->adult_dni[$key],
                'passenger_email' => $request->adult_email[$key],
                'passenger_name' => $request->adult_name[$key],
                'passenger_surname' => $request->adult_surname[$key],
                'passenger_birth_date' => $request->adult_birth_date[$key],
                'passenger_gender' => $request->adult_gender[$key],
                'passenger_phone' => $request->adult_phone[$key],
                'emergency_name' => $request->adult_emergency_name[$key],
                'emergency_contact' => $request->adult_emergency_contact[$key],
            ];
            // dump($data);
            Ticket::create($data);

            if($request->inbound_flight_id) {
                $data['flight_id'] = $request->inbound_flight_id;
                $data['price'] = $inbound_flight_price;
                $data['reservation_code'] = FlightHelper::generateReservationCode();
                $data['seat'] = FlightHelper::getAvailableSeat($inbound_flight, $request->flight_class);
                // dump($data);
                Ticket::create($data);
            }
        }

        if($request->child_dni) {
            // dump('CHILD');
            foreach ($request->child_dni as $key => $child) {
                $data = [
                    'flight_id' => $request->flight_id,
                    'cart_id' => $cart->id,
                    'type' => $request->flight_class,
                    'reservation_code' => FlightHelper::generateReservationCode(),
                    'status' => 'reserved',
                    'price' => $price,
                    'seat' => FlightHelper::getAvailableSeat($flight, $request->flight_class),
                    'passenger_document' => $request->child_dni[$key],
                    'passenger_email' => $request->adult_email[0],
                    'passenger_name' => $request->child_name[$key],
                    'passenger_surname' => $request->child_surname[$key],
                    'passenger_birth_date' => $request->child_birth_date[$key],
                    'passenger_gender' => $request->child_gender[$key],
                    'passenger_phone' => $request->adult_phone[0],
                    'emergency_name' => $request->child_emergency_name[$key],
                    'emergency_contact' => $request->child_emergency_contact[$key],
                ];
                // dump($data);
                Ticket::create($data);

                if($request->inbound_flight_id) {
                    $data['flight_id'] = $request->inbound_flight_id;
                    $data['price'] = $inbound_flight_price;
                    $data['reservation_code'] = FlightHelper::generateReservationCode();
                    $data['seat'] = FlightHelper::getAvailableSeat($inbound_flight, $request->flight_class);
                    // dump($data);
                    Ticket::create($data);
                }
            }
        }

        return redirect()->route('external.profile.booking-list')->with('success', 'Reserva realizada con éxito. Tienes 24 horas para pagarla o será cancelada.');
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
                        ->first();

        if(!$ticket) return redirect()->back()->with('danger', 'No se ha podido encontrar la reserva.');
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
}
