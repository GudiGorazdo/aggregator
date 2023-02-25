<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;

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
}
