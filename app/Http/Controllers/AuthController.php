<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data['role'] = UserRole::USER;

        $user = User::create($data);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'login' => 'required', // username или email
            'password' => 'required',
        ]);

        $login_type = filter_var($data['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([
            $login_type => $data['login'],
            'password' => $data['password']
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'login' => 'Неверные данные'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
