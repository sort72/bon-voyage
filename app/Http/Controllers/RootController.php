<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RootController extends Controller
{
    public function createAdmin()
    {
        return view('pages.dashboard.root.create-admin');
    }
}
