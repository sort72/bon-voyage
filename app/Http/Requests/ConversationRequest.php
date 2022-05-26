<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConversationRequest extends FormRequest
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
        $unique = Rule::unique('conversations', 'id');
        if(isset($this->conversation->id))
        {
            $unique = $unique->ignore($this->conversation->id);
        }

        return [
            'client_id' => ['required', 'exists:users,id'],
            'status' => ['required', 'string'],
            'unread_messages_by_client' => ['required', 'integer'],
            'unread_messages_by_admin' => ['required', 'integer'],
            'created_at' => ['nullable'],
            'updated_at' => ['nullable'],
            'created_at' => ['nullable']
        ];
    }
}
