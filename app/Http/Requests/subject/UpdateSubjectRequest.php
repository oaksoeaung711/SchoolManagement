<?php

namespace App\Http\Requests\subject;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $subject_id = $this->route('subject')->id;
        return [
            'name' => 'required|unique:subjects,name,' . $subject_id
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Subject name is required"
        ];
    }
}
