<?php

namespace app\core;

class Validator
{
    /**
     * @param $value
     * @param int $min
     * @param float $max
     * @return bool
     */
    public static function string($value, int $min = 1, float $max = INF): bool
    {
        $result = trim($value);

        return strlen($result) >= $min && strlen($result) <= $max;
    }
}