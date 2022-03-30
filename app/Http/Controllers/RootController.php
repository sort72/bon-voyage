<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RootController extends Controller
{
    public function createAdmin()
    {
        return view('pages.dashboard.root.create-admin');
    }

    public function storeAdmin(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'role' => 'admin',
            'dni' => $request->dni,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
            'birth_place' => $request->birth_place,
            'address' => $request->address,
            'gender' => $request->gender,
            'profile_picture' => '',
        ]);
    }
}
