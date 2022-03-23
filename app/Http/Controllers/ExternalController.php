<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalController extends Controller
{
    public function index()
    {
        return view("pages.external.index");
    }
}
