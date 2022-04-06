<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $unique = Rule::unique('flights');
        if(isset($this->flight->id)) $unique = $unique->ignore($this->flight->id);

        return [
            // 'name' => ['required', 'regex:/([A-Z]){2}([0-9]){3}/i', 'max:5', 'unique:flights'],
            'destination_id' => ['required', 'exists:destinations,id', 'different:origin_id'],
            'origin_id' => ['required', 'exists:destinations,id', 'different:destination_id'],
            'departure_time' => ['required', 'date', 'after:now'],
            'duration' => ['required', 'min:0', 'max:10000'],
            // 'arrival_time' => ['required', 'date', 'after:departure_time'],
            // 'is_international' => ['required', 'boolean'],
            'economy_class_price' => ['required', 'numeric', 'min:0', 'max:9999999999', 'lt:first_class_price'],
            'first_class_price' => ['required', 'numeric', 'min:0', 'max:9999999999', 'gt:economy_class_price'],
        ];
    }
}
