<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //bail: stop running validation rules on an attribute after the first validation failure
            'title' => "bail|required|max:255|unique:post,title,{$this->input('id')}",
            'author' => 'required',
            'body'=> 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required'=> 'please enter title',
            'title.max'=> 'title should not exceed 255 characters',
            'author.required'=> 'please enter author',
            'body.required'=> 'please enter content',
        ];
    }
}
