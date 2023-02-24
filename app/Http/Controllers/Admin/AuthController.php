<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) return redirect(route('home'));
        return view('auth.login', ['route' => route("admin.login")]);
    }

    public function login(Request $request)
    {
        $data = request()->validate([
            'login' => ["required"],
            'password' => ["required"],
        ]);

        if (auth()->guard('admin')->attempt($data)) return redirect(route('home'));
        return redirect(route('admin.login'))->withErrors(['error' => 'Имя пользователя не найдено или пароль не верный']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route("home"));
    }
}
