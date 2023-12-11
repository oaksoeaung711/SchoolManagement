<?php

namespace App\Http\Requests\auth;

use App\Rules\KBTCMail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required','email',new KBTCMail],
            'password' => ['required',Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ];
    }
}
