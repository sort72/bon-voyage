<?php

namespace App\Http\Controllers;

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
        return view("pages.external.user.edit-profile", compact("user", "city_id", "division_id", "country_id"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile (UserRequest $request){
        $user = auth()->user();
        $editPass = FALSE;

        if (!(empty($request->password))){
            if (checkPassword($request)){
                if ($request->new_password == $request->password_confirmation){
                    $user->update([
                        'name' => $request->name,
                        'surname' => $request->surname,
                        'city_id' => $request->city_id,
                        'address' => $request->address,
                        'gender' => $request->gender,
                        'password' => Hash::make($request->new_password),
                    ]);
            
                    return redirect()->route('/')->with('success', 'Información actualizada');
                }
                else{
                    return redirect()->route('dashboard')->with('failure', 'Las contraseñas no concuerdan'); 
                }
            }
            else{
                return redirect()->route('dashboard')->with('failure', 'La vieja contraseña no concuerda');
            }
        }
        else{
            $user->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'city_id' => $request->city_id,
                'address' => $request->address,
                'gender' => $request->gender,
            ]);
    
            return redirect()->route('dashboard')->with('success', 'Información actualizada');
        }
    }

    private function checkPassword (UserRequest $request){
        $oldPass = auth()->user()->password;
        $Pass = Hash::make($request->password);
        return $oldPass == $Pass;
    }
}
