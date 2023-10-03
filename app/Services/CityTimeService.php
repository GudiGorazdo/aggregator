<?php
namespace App\Services;
use Illuminate\Support\Carbon;

class CityTimeService
{
    public static function getTimezone(int $timezone)
    {
        return -(3 + $timezone);
    }

    public static function getTime(int $timezone): string
    {
        return Carbon::now()->subHours(self::getTimezone($timezone))->format('H:i');
    }

    public static function getFullTimeAndDate(int $timezone): string
    {
        return Carbon::now()->subHours(self::getTimezone($timezone))->format('H:i Y-m-d');
    }

    public static function getDate(int $timezone): string
    {
        return Carbon::now()->subHours(self::getTimezone($timezone))->format('Y-m-d');
    }
}


