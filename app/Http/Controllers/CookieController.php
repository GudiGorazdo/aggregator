<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Carbon;

class CookieController extends Controller
{
    static public function setCookie(
        string $cookie,
        string $value,
        int|string $time,
        string $path = '/',
        string|null $domain = null,
        bool $secure = false,
        bool $httpOnly = false,
        string $sameSite = 'Strict'
    ): void{
        Cookie::queue($cookie, $value, $time, $path, $domain, $secure, $httpOnly, $sameSite);
    }

    static public function getCookie(string $coockie): string|null
    {
        return Cookie::get($coockie);
    }

    static public function getYears($yaers): int
    {
        return (Carbon::now()->addYear($yaers)->timestamp - Carbon::now()->timestamp) / 60;
    }
}
