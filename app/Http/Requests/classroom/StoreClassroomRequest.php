<?php

namespace App\Http\Requests\classroom;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassroomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:classrooms,name'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Classroom name is required"
        ];
    }
}
