<?php
/*
  Получить строку для HTML атрибутов data-
@param $arr = [
    [
        'name' => string,               -- required
        'type' => string,               -- required
        'value_prefix' => string,       -- optional
        'value' => string               -- required
    ]
]

result  --  data-name_type=value_prefix-value
*/

function getDataSet(array $arr, $value = ''): string
{

    $dataSet = '';
    $value = $item['value'] ?? $value;
    foreach ($arr as $item) {
        $dataSet .=
            " data-"
            . $item['name']
            . '_'
            . $item['type']
            . '='
            . ($item['value_prefix'] . '-' ?? '')
            .  $value
            . ' ';
    }
    return $dataSet;
}
