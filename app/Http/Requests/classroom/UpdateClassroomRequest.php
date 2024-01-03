<?php

namespace App\Http\Requests\classroom;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassroomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $classroom_id = $this->route('classroom')->id;
        return [
            'name' => 'required|unique:classrooms,name,' . $classroom_id
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => "Classroom name is required"
        ];
    }
}
