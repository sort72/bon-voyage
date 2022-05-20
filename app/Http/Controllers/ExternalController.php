<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\SearchFlightRequest;
use App\Models\Flight;
use App\Helpers\FlightHelper;

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

    public function booking(Request $request){
        return view('pages.external.booking', [
            'number_of_adults' => 2,
            'number_of_children' => 1,
            'one_person_value' => '$250000',
            'taxex_fees_charges' => '$140000',
            'total_value' => '$390000',
            'departure_city' => 'Pereira',
            'arrival_city' => 'Cartegena de Indias',
            'outbound_flight_date' => '03 mar 2022',
            'abbr_departure_city' => 'pei',
            'abbr_arrival_city' => 'ctg',
            'outbound_departure_time' => '17:50',
            'outbound_arrival_time' => '19:09',
            'outbound_flight_time' => '1h 19m',
            'inbound_flight_date' => '02 jun 2022',
            'inbound_departure_time' => '11:20',
            'inbound_arrival_time' => '12:47',
            'inbound_flight_time' => '1h 27m',
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
        $flight_info = FlightHelper::getTotalSeats(true);
        return view('pages.external.seat',compact('flight_info'));
    }
}
