<?php
namespace App\Services;

class Helper
{
    static function log(mixed $data, string $dir = __DIR__, string $name = '/log.txt'): void
    {
        file_put_contents($dir . $name, "==========================" . date('Y-m-d H:i:s') . "===================================" . PHP_EOL, FILE_APPEND);
        file_put_contents($dir . $name, print_r($data, true) . PHP_EOL, FILE_APPEND);
    }

    static function getDataSetString(array $arr, $value = ''): string
    {
        /*
        @param $arr = [
            [
                'name' => string,          -- required
                'type' => string,          -- required
                'value_prefix' => string,  -- required
                'value' => string   -- optional
            ]
        ]

        result --  data-name_type=item_prefixvalue
        */

        $dataSet = '';
        $value = $item['value'] ?? $value;
        foreach ($arr as $item) {
            $dataSet .=
                "data-"
                . $item['name']
                . '_'
                . $item['type']
                . '='
                . ($item['value_prefix'] ?? '')
                .  $value
                . ' '
            ;
        }
        return $dataSet;
    }
}
