<?php
namespace App\Services;

class Helper
{
    static function log($data, $dir = __DIR__, $name = '/log.txt')
    {
        file_put_contents($dir . $name, "==========================" . date('Y-m-d H:i:s') . "===================================" . PHP_EOL, FILE_APPEND);
        file_put_contents($dir . $name, print_r($data, true) . PHP_EOL, FILE_APPEND);
    }
}
