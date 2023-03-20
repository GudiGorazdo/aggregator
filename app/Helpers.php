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
}
