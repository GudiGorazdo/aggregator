<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdmin
{
    public function handle($request, Closure $next)
    {
        // Проверяем, аутентифицирован ли пользователь с помощью охранника "admin"
        if (!Auth::guard('admin')->check()) {
            throw new AuthenticationException('Unauthenticated.', ['admin']);
        }

        return $next($request);
    }
}
