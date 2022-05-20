<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class BookFlightRequest extends FormRequest
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
            'flight_id' => ['required', 'exists:flights,id'],
            'inbound_flight_id' => ['sometimes', 'exists:flights,id', 'different:flight_id'],
            'passengers' => ['required', 'numeric', 'min:0', 'max:10'],
            'adults_count' => ['required', 'numeric', 'min:1', 'max:10'],
            'kids_count' => ['required', 'numeric', 'min:0', 'max:10'],
            'flight_class' => ['required', 'in:first_class,economy_class'],
        ];
    }
}
