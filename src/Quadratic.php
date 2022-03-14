<?php

namespace Architekt;

class Quadratic
{
    public static function solve($a, $b, $c): array
    {
        $d = $b * $b - 4 * $a * $c;
        
        if ($d > 0)
        {
            return [(-$b + sqrt($d) / 2 * $a), (-$b - sqrt($d) / 2 * $a)];
        } 
        
        if ($d == 0)
        {
            return [(-$b / 2 * $a)];
        }
        
        return [];
    }
}