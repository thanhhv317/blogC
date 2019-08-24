<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'      => 'required|min:5|max:127',
            'content'    => 'required',
            'attachment' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'title.required'      => 'please fill out the title',
            'title.min'           => 'Min title must be a 5 character',
            'title.max'           => 'Max title must be a 127 character',
            'content.required'    => 'Please fill out the content',
            'attachment.required' => 'Please chose an attachment',
            'attachment.image'    => 'Attachment must be an image'
        ];
    }
}
