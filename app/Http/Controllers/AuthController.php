<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login', ['route' => route('login')]);
    }
    public function login()
    {
        return redirect(route('home'));
    }
    public function logout()
    {
        return redirect(route('home'));
    }
}
