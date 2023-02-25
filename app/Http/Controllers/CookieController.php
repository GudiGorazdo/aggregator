<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Carbon;

class CookieController extends Controller
{
    static public function setCookie(string $cookie, string $value, int|string $time): void
    {
        Cookie::queue($cookie, $value, $time);
    }

    static public function getCookie(string $coockie): string
    {
        return Cookie::get($coockie);
    }

    static public function getYears($yaers): int
    {
        return (Carbon::now()->addYear($yaers)->timestamp - Carbon::now()->timestamp) / 60;
    }
}
