<?php

namespace App\Http\Controllers;

use App\Helpers\FlightHelper;
use App\Http\Requests\BookFlightRequest;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\SearchFlightRequest;
use App\Models\Cart;
use App\Models\Flight;
use App\Models\Ticket;

class ExternalController extends Controller
{
    public function index()
    {
        return view("pages.external.index");
    }

    public function flights(SearchFlightRequest $request)
    {
        if($request->has('back_time') && $request->back_time) {

            $flights = Flight::where(function($query) use ($request) {
                            $query->where(function($query) use($request) {
                                $query->where('origin_id', $request->origin_id)->where('destination_id', $request->destination_id);
                            })
                            ->orWhere(function($query) use($request) {
                                $query->where('origin_id', $request->destination_id)->where('destination_id', $request->origin_id);
                            });
                        })
                        ->where(function($query) use ($request) {
                            $query->whereBetween('departure_time', [$request->departure_time . ' 00:00:00', $request->departure_time . ' 23:59:59'])
                                ->orWhereBetween('departure_time', [$request->back_time . ' 00:00:00', $request->back_time . ' 23:59:59']);
                        })
                        ->get();
        }
        else {
            $flights = Flight::where('origin_id', $request->origin_id)
                        ->where('destination_id', $request->destination_id)
                        ->whereBetween('departure_time', [$request->departure_time . ' 00:00:00', $request->departure_time . ' 23:59:59'])
                        ->get();
        }




        return view('pages.external.flights', compact('flights'));
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
        dump($request->all());

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
            dump($data);
            // Ticket::create([
            //     'flight_id'
            // ]);
            if($request->inbound_flight_id) {

            }
        }
    }

    public function editProfile(Request $request){
        return view('pages.external.user.edit-profile');
    }

    public function changeSeat()
    {
        return view('pages.external.seat');
    }
}
