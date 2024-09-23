<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'questions' => 'required|array|min:1|max:10',  
            'questions.*' => 'required|string|unique:questions,question|max:255',  

            'answers' => 'required|array',  
            'answers.*' => 'required|string|max:255',
        ];
    }
}
