<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rule = 'required|string|between:6,20';

        return [
            'login' => $rule.'|regex:/^[a-zA-Z\s-]+$/u',
            'password' => $rule,
        ];
    }

    public function messages(): array
    {
        return [
            'login.regex' => 'Только кририллица, пробел и тире',
        ];
    }
}
