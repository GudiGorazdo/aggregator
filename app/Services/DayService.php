<?php

namespace App\Services;

use Illuminate\Support\Carbon;

class DayService
{
    public static function getDayNumByDate(string $date): int
    {
        $day = Carbon::parse($date)->dayOfWeek;
        if ($day === 0) $day = 7;
        return $day;
    }

    public static function getDayByNum(int $num): string
    {
        $days = [ 'ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ', 'ВС', ];
        return $days[$num - 1];
    }

    public static function getDayByDate(string $date): string
    {
        return self::getDayByNum(self::getDayByDate($date));
    }
}


