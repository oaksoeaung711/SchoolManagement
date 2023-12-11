<?php

namespace App\Http\Requests\auth;

use App\Rules\KBTCMail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'firstname' => "required|string",
            'lastname' => "required|string",
            'email' => ['required','email',new KBTCMail,'unique:users,email'],
            'phone' => "required|numeric",
            'password' => ['required',Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'confirm_password' => 'same:password',
        ];
    }
}
