<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
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

        $unique = Rule::unique('users');
        if(isset($this->user_id)) $unique = $unique->ignore($this->user_id);

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'max:20', $unique],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', $unique],
        ];

        if(!$this->creating_mode || $this->creating_mode != 'admin') {
            $client_rules = [
                'birth_date' => ['required', 'date', 'before:-18 years', 'after:-85 years'],
                'gender' => ['required', Rule::in(['male', 'female', 'others'])],
                'country_id' => ['required', 'exists:world_countries,id'],
                'division_id' => ['nullable', 'exists:world_divisions,id'],
                'city_id' => ['required', 'exists:world_cities,id'],
                'address' => ['required', 'string', 'max:255']
            ];

            if(!isset($this->user_id)) $client_rules['password'] = ['required', 'confirmed', Rules\Password::defaults()];

            $rules = array_merge($rules, $client_rules);
        }

        // Log::info($rules);
        return $rules;
    }
}
