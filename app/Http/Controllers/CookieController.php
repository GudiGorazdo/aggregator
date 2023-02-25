<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Carbon;

class CookieController extends Controller
{
    static public function setCookie($cookie, $value, $time)
    {
        Cookie::queue($cookie, $value, $time);
    }

    static public function getCookie($coockie)
    {
        return Cookie::get($coockie);
    }

    static public function getYears($yaers)
    {
        return (Carbon::now()->addYear($yaers)->timestamp - Carbon::now()->timestamp) / 60;
    }
}
