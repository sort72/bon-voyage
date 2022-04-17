<?php

namespace App\Http\Controllers;

use App\Helpers\FlightHelper;
use App\Helpers\LocationHelper;
use App\Models\Flight;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Requests\FlightRequest;
use Carbon\Carbon;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard.flight.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations = Destination::all();
        return view('pages.dashboard.flight.create', compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(FlightRequest $request)
    {
        $name = FlightHelper::generateName();
        $arrival_time = Carbon::parse($request->departure_time)->addMinutes($request->duration);

        Flight::create([
            'name' => $name,
            'economy_class_price' => $request->economy_class_price,
            'first_class_price' => $request->first_class_price,
            'destination_id' => $request->destination_id,
            'origin_id' => $request->origin_id,
            'departure_time' => $request->departure_time,
            'arrival_time' => $arrival_time,
            'is_international' => ! LocationHelper::areDestinationsFromTheSameCountry($request->origin_id, $request->destination_id),
            'price_tourist' => $request->price_tourist,
            'price_business' => $request->price_vip
        ]);

        return redirect()->route('dashboard.flight.index')->with('success', 'Vuelo ' . $request->name . ' creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        $destinations = Destination::all();
        return view('pages.dashboard.flight.edit', compact('flight','destinations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(FlightRequest $request, Flight $flight)
    {
        $arrival_time = Carbon::parse($request->departure_time)->addMinutes($request->duration);

        $flight->update([
            'economy_class_price' => $request->economy_class_price,
            'first_class_price' => $request->first_class_price,
            'destination_id' => $request->destination_id,
            'origin_id' => $request->origin_id,
            'departure_time' => $request->departure_time,
            'arrival_time' => $arrival_time,
            'is_international' => ! LocationHelper::areDestinationsFromTheSameCountry($request->origin_id, $request->destination_id),
            'price_tourist' => $request->price_tourist,
            'price_business' => $request->price_vip,
            'discount' => $request->discount
        ]);

        return redirect()->route('dashboard.flight.index')->with('success', 'Vuelo ' . $request->name . ' modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        //
    }
}
