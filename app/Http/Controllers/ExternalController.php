<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;

class ExternalController extends Controller
{
    public function index()
    {
        return view("pages.external.index");
    }

    public function flights(Request $request)
    {
        dd($request->all());
        return view('pages.external.flights');
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

    public function activeBookings(){
        return view('pages.external.active-bookings');
    }

    public function editProfile(Request $request){
        return view('pages.external.user.edit-profile');
    }

    public function changeSeat()
    {
        return view('pages.external.seat');
    }
}
