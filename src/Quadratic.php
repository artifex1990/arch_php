<?php

namespace Architekt;

class Quadratic
{
    public static function solve($a, $b, $c): array
    {
        if (self::isNanOrInfiniteNumbers($a, $b, $c)) {
            throw new NotNumericException();
        }

        $precision = 5;
        $epsilon = 1 / pow(10, $precision);

        $a = round($a, $precision);
        $b = round($b, $precision);

        if ($a == 0) {
            throw new ZeroException();
        }

        $d = $b * $b - 4.0 * $a * $c;
        
        if ($d > 0) {
            return [(-$b + sqrt($d) / 2.0 * $a), (-$b - sqrt($d) / 2.0 * $a)];
        } 
        
        if ($d < $epsilon & round($d, $precision) == 0) {
            return [(-$b / 2.0 * $a)];
        }
        
        return [];
    }

    private static function isNanOrInfiniteNumbers(...$params): bool
    {
        foreach($params as $elem) {
            if (is_nan($elem) || is_infinite($elem)) {
                return true;
            }
        }

        return false; 
    }
}