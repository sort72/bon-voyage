<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestinationRequest;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard.destination.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.destination.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\DestinationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DestinationRequest $request)
    {
        $destination = Destination::create([
            'city_id' => $request->city_id,
            'timezone' => $request->timezone
        ]);

        $file = $request->file('image')->getContent();
        Storage::disk('public')->put('destinations/'.$destination->id . '.png',$file);

        return redirect()->route('dashboard.destination.index')->with('success', 'Destino ' . $request->name . ' creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {

        return view('pages.dashboard.destination.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(DestinationRequest $request, Destination $destination)
    {
        $destination->update($request->only(['city_id','timezone']));

        if($request->file('image'))
        {
            $file = $request->file('image')->getContent();
            Storage::disk('public')->put('destinations/'.$destination->id . '.png', $file);
        }


        return redirect()->route('dashboard.destination.index')->with('success', 'Destino ' . $request->name . ' modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
