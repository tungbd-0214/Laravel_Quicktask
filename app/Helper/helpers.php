<?php

if (!function_exists('formatDateYMD')) {
    function formatDateYMD($date, string $format = 'Y/m/d')
    {
        if ($date instanceof \Carbon\Carbon) {
            return $date->format($format);
        }

        return $date;
    }
}

if (!function_exists('formatDateDMY')) {
    function formatDateDMY($date, string $format = 'd/m/Y')
    {
        if ($date instanceof \Carbon\Carbon) {
            return $date->format($format);
        }

        return $date;
    }
}
