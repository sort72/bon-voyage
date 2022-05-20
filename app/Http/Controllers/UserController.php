<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;

class UserController extends Controller
{
    public function editProfile (){
        $user = auth()->user();
        $city = City::where('id', $user->city_id)->first();
        $city_id = $city ? $city->id : null;
        $division_id = $city ? $city->division_id : null;
        $country_id = $city ? $city->country_id : null;
        return view("pages.external.user.edit-profile", compact("user", "country_id", "division_id", "city_id"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile (UserRequest $request){
        $user = User::find($request->user_id);
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
        ]);

        return redirect()->route('external.profile.edit')->with('success', 'Información actualizada');
    }

    public function bookingList()
    {
        return view('pages.external.user.booking-list');
    }

    public function purchasesList()
    {
        return view('pages.external.user.purchase-list');
    }

    public function cart()
    {

    }

}
