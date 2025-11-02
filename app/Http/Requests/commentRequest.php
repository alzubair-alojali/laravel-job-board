<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class commentRequest extends FormRequest
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
            'author'=>'required',
            'content'=>'required',
        ];
    }
    public function messages(): array{
        return [
            'author.required'=>'please enter author ',
            'content.required'=> 'please enter content'
        ];
    }
}
