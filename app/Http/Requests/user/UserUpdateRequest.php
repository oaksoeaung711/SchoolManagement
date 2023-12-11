<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $user_id = $this->route('user')->id;
        return [
            "firstname" => "required|string",
            "lastname" => "required|string",
            "email" => "required|unique:users,email,".$user_id,
            "password" => ["nullable",Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            "phone" => "required|numeric",
        ];
    }
}
