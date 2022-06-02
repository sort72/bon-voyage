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
            'destination_id' => ['nullable', 'exists:destinations,id', 'different:origin_id'],
            'origin_id' => ['nullable', 'exists:destinations,id', 'different:destination_id'],
            'passengers' => ['nullable', 'numeric', 'min:0', 'max:10'],
            'adults_count' => ['nullable', 'numeric', 'min:1', 'max:10'],
            'kids_count' => ['nullable', 'numeric', 'min:0', 'max:10'],
            'flight_class' => ['nullable', 'in:first_class,economy_class'],
            'departure_time' => ['nullable', 'date', 'after:' . Carbon::now('America/Bogota')->subDay()],
            'back_time' => ['nullable', 'date', 'after_or_equal:departure_time'],
            'minimum_economy_class_price' => ['nullable', 'numeric', 'min:0', 'max:100000000', 'lt:maximum_economy_class_price'],
            'maximum_economy_class_price' => ['nullable', 'numeric', 'min:0', 'max:100000000'],
            'minimum_business_class_price' => ['nullable', 'numeric', 'min:0', 'max:100000000', 'lt:maximum_business_class_price'],
            'maximum_business_class_price' => ['nullable', 'numeric', 'min:0', 'max:100000000'],
            'duration' => ['nullable', 'numeric', 'min:0', 'max:1000'],
        ];
    }
}
