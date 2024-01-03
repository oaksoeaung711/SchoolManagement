<?php

namespace App\Http\Requests\profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "image" => "mimes:png,jpg,jpeg,ico,gif,svg|max:2048"
        ];
    }
}
