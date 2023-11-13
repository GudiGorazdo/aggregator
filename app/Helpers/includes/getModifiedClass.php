<?php
/**
 *
 * Создает строку модификаторов исходного класса по бэм
 * @className   - строка с исходным названием класса
 * @modifier    - строка или массив строк (с любым уровнем вложенных массивов)
 *
 */
function getModifiedClass(string $className, array|string|false|null $modifier): string
{
    if (!is_array($modifier)) return $modifier ? " $className--$modifier"  : "";
    $string = '';
    foreach ($modifier as $value) {
        if (is_array($value)) {
            $string .= getModifiedClass($className, $value);
            continue;
        }
        $string  .= $value ? " $className--$value"  : "";
    }
    return $string;
}
