<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
            'number' => ['required', 'numeric', 'min:10000', 'max:9999999999999999'],
            'cvc' => ['required', 'numeric', 'min:100', 'max:999'],
            'holder_name' => ['required', 'string', 'min:3'],
            'expiration_date' => ['required', 'date', 'after:last month'],
            'amount' => ['required', 'numeric', 'min:0', 'max:999999999999'],
        ];
    }
}
