<?php

namespace App\Services;

class Initials {

    
    public static function generate(string $name) : string
    {
        $words = explode(' ', $name);
        if (count($words) >= 2) {
            return strtoupper(mb_substr($words[0], 0, 1, 'utf-8') . mb_substr(end($words), 0, 1, 'utf-8'));
        }
        return self::makeInitialsFromSingleWord($name);
    }

    
    protected static function makeInitialsFromSingleWord(string $name) : string
    {
        preg_match_all('#([A-Zaz]+)#', $name, $capitals);
        if (count($capitals[1]) >= 2) {
            return mb_substr(implode('', $capitals[1]), 0, 2, 'utf-8');
        }
        return strtoupper(substr($name, 0, 2));
    }
}