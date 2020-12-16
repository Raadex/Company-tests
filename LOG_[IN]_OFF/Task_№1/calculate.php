<?php
class Calculate
{
    public static function sum($num1, $num2)
    {
        return $num1 + $num2;
    }
    public static function diff($num1, $num2)
    {
        return $num1 - $num2;
    }
    public static function mult($num1, $num2)
    {
        return $num1 * $num2;
    }
    public static function div($num1, $num2)
    {
        if ($num2 == 0) {
            return "деление на 0";
        }
        return $num1 / $num2;
    }
}