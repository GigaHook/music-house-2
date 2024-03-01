<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login(UserLoginRequest $request): RedirectResponse
    {
        if (!auth()->attempt($request->only(['login', 'password']))) {
            throw ValidationException::withMessages([
                'email' => 'Неверный логин или пароль',
            ]);
        }

        session()->regenerate();

        return to_route('Home');
    }

    public function register(UserRegisterRequest $request): RedirectResponse
    {
        auth()->login(User::create($request->validated()));
        return to_route('Home');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->back();
    }
}
