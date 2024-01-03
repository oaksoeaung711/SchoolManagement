<?php

namespace App\Http\Requests\profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateProfilePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "old_password" => "required",
            "new_password" => ["required",Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            "confirm_password" => "same:new_password"
        ];
    }
}
