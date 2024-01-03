<?php

namespace App\Http\Requests\time;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'from' => 'required|unique:times,from',
            'to' => 'required|unique:times,to',
        ];
    }

    public function messages(): array
    {
        return [
            'from.required' => "This field is required",
            'to.required' => "This field is required"
        ];
    }
}
