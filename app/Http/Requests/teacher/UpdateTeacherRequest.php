<?php

namespace App\Http\Requests\teacher;

use App\Rules\KBTCMail;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $teacher_id = $this->route('teacher')->id;
        return [
            "name" => "required",
            "email" => ["required","unique:teachers,email,$teacher_id","email",new KBTCMail],
            "phone" => "required",
            "sign" => "mimes:png|max:2048"
        ];
    }
}
