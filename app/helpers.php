<?php


if (!function_exists('mb_strrev')) {
    function mb_strrev(string $string): string
    {
        $r = '';
        for ($i = mb_strlen($string); $i>=0; $i--) {
            $r .= mb_substr($string, $i, 1);
        }
        return $r;
    }
}

function hello()
{
    return "hello";
}
