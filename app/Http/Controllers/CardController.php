<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.external.user.card.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.external.user.card.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardRequest $request)
    {
        Card::create([
            'client_id' => Auth()->user()->id,
            'type' => 'credit',
            'holder_name' => $request->holder_name,
            'number' => $request->number,
            'expiration_date' => $request->expiration_date,
            'cvc' => $request->cvc,
            'amount' => $request->amount,
        ]);

        return redirect()->route('external.profile.card.index')->with('success', 'Tarjeta añadida con éxito');
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
    public function edit(Card $card)
    {
        return view('pages.external.user.card.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CardRequest $request, Card $card)
    {
        $card->update([
            'holder_name' => $request->holder_name,
            'number' => $request->number,
            'expiration_date' => $request->expiration_date,
            'cvc' => $request->cvc,
            'amount' => $request->amount,
        ]);

        return redirect()->route('external.profile.card.index')->with('success', 'Tarjeta actualizada con éxito');
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
