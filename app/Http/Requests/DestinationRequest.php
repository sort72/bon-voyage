<?php

namespace App\Http\Requests;

use App\Helpers\LocationHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DestinationRequest extends FormRequest
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
        $unique = Rule::unique('destinations', 'city_id');
        $required_image = 'required';
        if(isset($this->destination->id))
        {
            $required_image = 'sometimes';
            $unique = $unique->ignore($this->destination->id);
        }

        return [
            'country_id' => ['required', 'exists:world_countries,id'],
            'division_id' => ['nullable', 'exists:world_divisions,id'],
            'city_id' => ['required', 'exists:world_cities,id', $unique],
            'image' => [$required_image, 'image', 'file', 'max:4000'],
            'timezone' => ['required', 'string', Rule::in(array_keys(LocationHelper::timezones()))]
        ];
    }
}
