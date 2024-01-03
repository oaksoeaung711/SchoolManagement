<?php

namespace App\Http\Requests\subject;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:subjects,name'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Subject name is required"
        ];
    }
}
