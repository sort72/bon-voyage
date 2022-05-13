<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function changeSeat()
    {
        return view('pages.external.seat');
    }
}
