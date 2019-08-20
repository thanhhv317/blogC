<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required',
            'message' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please fill in the email',
            'email.email' => 'Email not incorect',
            'name.required' => 'Please fill in the name',
            'message.required' => 'Please fill in the message'
        ];
    }
}
