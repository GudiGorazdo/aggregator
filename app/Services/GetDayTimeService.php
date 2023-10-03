<?php
namespace App\Services;
use Illuminate\Support\Carbon;

class GetDayTimeService
{
    public static function getTimezone(int $timezone)
    {
        return -(3 + $timezone);
    }

    public static function getNowDayName(int $timezone): string
    {
       return strtolower(Carbon::now()->subHours(self::getTimezone($timezone))->isoFormat('dddd'));
    }

    public static function getNowDayNum(int $timezone): string
    {
        return self::getDayNumByName(self::getNowDayName($timezone));
    }

    public static function getDayNumByName(string $name): string
    {
        switch (strtolower($name)) {
            case 'monday':
                return 1;
            case 'tuesday':
                return 2;
            case 'wednesday':
                return 3;
            case 'thursday':
                return 4;
            case 'friday':
                return 5;
            case 'saturday':
                return 6;
            case 'sunday':
                return 7;
        }
   }

   public static function getDayNumByRuName(string $name): string
   {
        switch (strtolower($name)) {
            case 'понедельник':
                return 1;
            case 'вторник':
                return 2;
            case 'среда':
                return 3;
            case 'четверг':
                return 4;
            case 'пятница':
                return 5;
            case 'суббота':
                return 6;
            case 'воскресенье':
                return 7;
        }
    }

    public static function getDayByNum(int $num): string
    {
        switch ($num) {
            case 1:
                return 'monday';
            case 2:
                return 'tuesday';
            case 3:
                return 'wednesday';
            case 4:
                return 'thursday';
            case 5:
                return 'friday';
            case 6:
                return 'saturday';
            case 7:
                return 'sunday';
        }
    }

    public static function getRuDayByNum(int $num): string
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

    public static function getTime(int $timezone): string
    {
        return Carbon::now()->subHours(self::getTimezone($timezone))->format('H:i');
    }

    public static function getFullTime(int $timezone): string
    {
        return Carbon::now()->subHours(self::getTimezone($timezone))->format('l Y-m-d H:i');
    }
}


