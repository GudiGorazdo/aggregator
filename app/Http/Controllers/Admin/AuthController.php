<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login', ['route' => route("admin.login")]);
    }

    public function login(Request $request)
    {
        $data = request()->validate([
            'login' => ["required"],
            'password' => ["required"],
        ]);

        if (auth("admin")->attempt($data)) return redirect(route('home'));
        return redirect(route('admin.login'))->withErrors(['error' => 'Имя пользователя не найдено или пароль не верный']);
    }
}
