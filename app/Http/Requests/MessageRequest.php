<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class MessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $unique = Rule::unique('messages', 'id');
        if(isset($this->message->id))
        {
            $unique = $unique->ignore($this->message->id);
        }

        return [
            'conversation_id' => ['required', 'exists:conversations,id'],
            'admin_id' => ['nullable', 'exists:users,id'],
            'message_body' => ['required', 'string'],
            'created_at' => ['nullable'],
            'updated_at' => ['nullable'],
            'created_at' => ['nullable']
        ];
    }
}
