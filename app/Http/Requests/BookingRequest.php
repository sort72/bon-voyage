<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class BookingRequest extends FormRequest
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
        $flight_id = [$this->flight_id];
        if($this->inbound_flight_id) $flight_id[] = $this->inbound_flight_id;

        $unique_dni = Rule::unique('tickets', 'passenger_document')->where(function ($query) use($flight_id) {
            return $query->whereIn('flight_id', $flight_id);
        });

        $adults_rules = [
            'adult_dni' => ['required', 'array'],
            'adult_dni.*' => ['required', 'string', 'distinct', 'min:3','max:20', $unique_dni],
            'adult_name' => ['required', 'array'],
            'adult_name.*' => ['required', 'string', 'max:255'],
            'adult_surname' => ['required', 'array'],
            'adult_surname.*' => ['required', 'string', 'max:255'],
            'adult_email' => ['required', 'array'],
            'adult_email.*' => ['required', 'string', 'email:rfc,dns', 'max:255',],
            'adult_birth_date' => ['required', 'array'],
            'adult_birth_date.*' => ['required', 'date', 'before:-18 years', 'after:-85 years'],
            'adult_gender' => ['required', 'array'],
            'adult_gender.*' => ['required', Rule::in(['male', 'female', 'others'])],
            'adult_phone' => ['required', 'array'],
            'adult_phone.*' => ['required', 'numeric', 'integer', 'min:100000', 'max:99999999999999'],
            'adult_emergency_name' => ['required', 'array'],
            'adult_emergency_name.*' => ['required', 'string', 'max:255'],
            'adult_emergency_contact' => ['required', 'array'],
            'adult_emergency_contact.*' => ['required', 'numeric', 'integer', 'min:100000', 'max:99999999999999'],
        ];

        $children_rules = [
            'child_dni' => ['sometimes', 'required', 'array'],
            'child_dni.*' => ['required', 'string', 'distinct', 'min:3','max:20', $unique_dni],
            'child_name' => ['sometimes', 'required', 'array'],
            'child_name.*' => ['required', 'string', 'max:255'],
            'child_surname' => ['sometimes', 'required', 'array'],
            'child_surname.*' => ['required', 'string', 'max:255'],
            'child_birth_date' => ['sometimes', 'required', 'array'],
            'child_birth_date.*' => ['required', 'date', 'after:-18 years'],
            'child_gender' => ['sometimes', 'required', 'array'],
            'child_gender.*' => ['required', Rule::in(['male', 'female', 'others'])],
            'child_emergency_name' => ['sometimes', 'required', 'array'],
            'child_emergency_name.*' => ['required', 'string', 'max:255'],
            'child_emergency_contact' => ['sometimes', 'required', 'array'],
            'child_emergency_contact.*' => ['required', 'numeric', 'integer', 'min:100000', 'max:99999999999999'],
        ];

        $rules = [
            'flight_id' => ['required', 'exists:flights,id'],
            'inbound_flight_id' => ['nullable', 'exists:flights,id', 'different:flight_id'],
            'flight_class' => ['required', 'in:first_class,economy_class'],
        ];

        return array_merge($rules, $adults_rules, $children_rules);
    }
}
