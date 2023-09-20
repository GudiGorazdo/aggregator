<?php
namespace App;

class Helpers
{
    static function log(mixed $data, string $dir = __DIR__, string $name = '/log.txt'): void
    {
        if (!file_exists($dir)) mkdir($dir, 0755, true);
        file_put_contents($dir . $name, "==========================" . date('Y-m-d H:i:s') . "===================================" . PHP_EOL, FILE_APPEND);
        file_put_contents($dir . $name, print_r($data, true) . PHP_EOL, FILE_APPEND);
    }

    public static function getNumEnding(int $number, array $endingArray): string
    {
        $number = $number % 100;
        if ($number>=11 && $number<=19) {
            $ending=$endingArray[2];
        }
        else {
            $i = $number % 10;
            switch ($i)
            {
                case (1): $ending = $endingArray[0]; break;
                case (2):
                case (3):
                case (4): $ending = $endingArray[1]; break;
                default: $ending=$endingArray[2];
            }
        }
        return $ending;
    }
}


