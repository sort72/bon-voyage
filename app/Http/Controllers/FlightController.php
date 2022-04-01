<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Requests\FlightRequest;

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
        return view('pages.dashboard.flight.create', ['min_flight_date' => date('Y-m-d')]);
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
        Flight::create([
            'name' => $request->name,
            'destination_id' => $request->destination_id,
            'origin_id' => $request->origin_id,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'is_international' => $request->is_international
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
        return view('pages.dashboard.flight.edit', compact('flight'));
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
        $destination->update($request->only(['name','destination_id','origin_id','departure_time','arrival_time','is_international']));

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
