<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\WelcomeAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RootController extends Controller
{
    public function listAdmin()
    {
        // $user = auth()->user();
        // $token = app('auth.password.broker')->createToken($user);
        // Mail::to($user->email)->send(new WelcomeAdmin($user, $token));
        return view('pages.dashboard.root.list-admin');
    }

    public function createAdmin()
    {
        return view('pages.dashboard.root.create-admin');
    }

    public function storeAdmin(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'role' => 'admin',
            'dni' => $request->dni,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'gender' => $request->gender,
            'profile_picture' => '',
            'password' => 'changeme'
        ]);

        // Generate a new reset password token
        $token = app('auth.password.broker')->createToken($user);
        Mail::to($user->email)->send(new WelcomeAdmin($user, $token));



        return redirect()->route('dashboard.list-admin')->with('success', 'Administrador ' . $request->name . ' creado con éxito');
    }
}
