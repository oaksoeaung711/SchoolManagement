<?php

namespace App\Http\Requests\teacher;

use App\Rules\KBTCMail;
use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "required",
            "email" => ["required","unique:teachers,email","email",new KBTCMail],
            "phone" => "required",
            "sign" => "mimes:png|max:2048"
        ];
    }
}
