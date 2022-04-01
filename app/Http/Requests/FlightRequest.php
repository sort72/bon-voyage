<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlightRequest extends FormRequest
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
        /*$unique = Rule::unique('flights');
        if(isset($this->flight->id)) $unique = $unique->ignore($this->flight->id);*/

        return [
            'name' => ['required', 'regex:/([A-Z]){2}([0-9]){3}/i', 'max:5', 'unique:flights'],
            'destination_id' => ['required', 'exists:destinations,id'],
            'origin_id' => ['required', 'exists:destinations,id'],
            'departure_time' => ['required', 'date', 'after:now'],
            'arrival_time' => ['required', 'date', 'after:departure_time'],
            'is_international' => ['required', 'boolean'],
            'price_tourist' => ['numeric','integer','required','min:1','max:5000000'],
            'price_business' => ['numeric','integer','required','min:1','max:5000000'],
            'discount' => ['numeric','integer','required','min:1','max:100']
        ];
    }
}
