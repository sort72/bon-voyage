<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'max:20', 'unique:users'],
            'birth_date' => ['required', 'date', 'before:-18 years', 'after:-85 years'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => ['required'],
            'country_id' => ['required', 'exists:world_countries,id'],
            'division_id' => ['nullable', 'exists:world_divisions,id'],
            'city_id' => ['required', 'exists:world_cities,id'],
            'address' => ['required', 'string', 'max:255']
        ];
    }
}
