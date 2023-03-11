<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdmin
{
    public function handle($request, Closure $next)
    {
        dd('aklsdflaj');
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.shops.index');
        }

        return $next($request);
    }
}
