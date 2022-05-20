<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookFlightRequest;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\SearchFlightRequest;
use App\Models\Flight;

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
    }

    public function editProfile(Request $request){
        return view('pages.external.user.edit-profile');
    }

    public function changeSeat()
    {
        return view('pages.external.seat');
    }
}
