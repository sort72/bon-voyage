<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class SearchFlightRequest extends FormRequest
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
            'destination_id' => ['required', 'exists:destinations,id', 'different:origin_id'],
            'origin_id' => ['required', 'exists:destinations,id', 'different:destination_id'],
            'passengers' => ['required', 'numeric', 'min:0', 'max:10'],
            'adults_count' => ['required', 'numeric', 'min:1', 'max:10'],
            'kids_count' => ['required', 'numeric', 'min:0', 'max:10'],
            'flight_class' => ['required', 'in:first_class,economy_class'],
            'departure_time' => ['required', 'date', 'after:' . Carbon::now('America/Bogota')->subDay()],
            'back_time' => ['nullable', 'date', 'after_or_equal:departure_time'],
        ];
    }
}
