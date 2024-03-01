<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
        $rus = '|regex:/^[a-zA-Z\s-]+$/u';
        $eng = '|regex:/^[a-zA-Z\s-]+$/u';

        return [
            'name' => $rule.$rus,
            'surname' => $rule.$rus,
            'patronymic' => $rule.$rus,
            'login' => $rule.$eng,
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => $rule,
        ];
    }

    public function messages(): array
    {
        return [
            'name.regex' => 'Только русские буквы',
            'surname.regex' => 'Только русские буквы',
            'patronymic.regex' => 'Только русские буквы',
            'login.regex' => 'Только кририллица, пробел и тире',
            'email.unique' => 'Эта почта уже занята',
        ];
    }
}
