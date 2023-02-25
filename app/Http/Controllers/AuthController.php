<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.login', ['route' => route('login')]);
    }
    public function login(): RedirectResponse
    {
        return redirect(route('home'));
    }
    public function logout(): RedirectResponse
    {
        return redirect(route('home'));
    }
}
