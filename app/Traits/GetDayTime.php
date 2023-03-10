<?php
namespace App\Traits;
use Illuminate\Support\Carbon;

trait GetDayTime
{
    private static function getTimezone(int $timezone)
    {
        return -(3 + $timezone);
    }

    private static function getNowDayName(int $timezone): string
    {
       return strtolower(Carbon::now()->subHours(self::getTimezone($timezone))->isoFormat('dddd'));
    }

    private static function getNowDayNum(int $timezone): string
    {
        return self::getDayNumByName(self::getNowDayName($timezone));
    }

    private static function getDayNumByName(string $name): string
    {
        switch ($name) {
            case 'monday' || 'понедельник':
                return 1;
            case 'tuesday' || 'вторник':
                return 2;
            case 'wednesday' || 'среда':
                return 3;
            case 'thursday' || 'четверг':
                return 4;
            case 'friday' || 'пятница':
                return 5;
            case 'saturday' || 'суббота':
                return 6;
            case 'sunday' || 'воскресенье':
                return 7;
        }
    }

    private static function getDayByNum(int $num): string
    {
        switch ($num) {
            case 1:
                return 'понедельник';
            case 2:
                return 'вторник';
            case 3:
                return 'среда';
            case 4:
                return 'четверг';
            case 5:
                return 'пятница';
            case 6:
                return 'суббота';
            case 7:
                return 'воскресенье';
        }
    }

    private static function getTime(int $timezone): string
    {
        return Carbon::now()->subHours(self::getTimezone($timezone))->format('H:i');
    }

    private static function getFullTime(int $timezone): string
    {
        return Carbon::now()->subHours(self::getTimezone($timezone))->format('l Y-m-d H:i');
    }
}
