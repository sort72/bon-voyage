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
        $unique = Rule::unique('destinations');
        if(isset($this->destination->id)) $unique = $unique->ignore($this->destination->id);

        return [
            'country_id' => ['required', 'exists:countries,id'],
            'state_id' => ['required', 'exists:states,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'timezone' => ['required', 'string', Rule::in(array_keys(LocationHelper::timezones()))]
        ];
    }
}
