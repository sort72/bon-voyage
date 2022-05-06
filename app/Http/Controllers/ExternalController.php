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
        return view('pages.external.flights');
    }

    public function editProfile(Request $request)
    {
        return view('pages.external.user.edit');
    }

    public function changeSeat()
    {
        return view('pages.external.seat');
    }
}
