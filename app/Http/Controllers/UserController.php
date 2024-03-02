<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        throw_unless(
            auth()->attempt($request->only(['login', 'password'])),
            ValidationException::withMessages(['login' => 'Неверный логин или пароль']),
        );

        session()->regenerate();

        return to_route('Home');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'unique:App\Models\User,email',
            'login' => 'unique:App\Models\User,login',
        ], [
            'email.unique' => 'Такой пользователь уже зарегистрирован',
            'login.unique' => 'Такой пользователь уже зарегистрирован',
        ]);

        auth()->login(User::create($request->all()));
        
        return to_route('Home');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        return to_route('About');
    }
}
