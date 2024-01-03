<?php

namespace App\Http\Requests\time;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTimeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $time_id = $this->route('time')->id;
        return [
            'from' => 'required|unique:times,from,'.$time_id,
            'to' => 'required|unique:times,to,'.$time_id,
        ];
    }

    public function messages(): array
    {
        return [
            'from.required' => "This feild is required",
            'to.required' => "This feild is required"
        ];
    }
}
