<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

function getFormattedDate($date): String
{
    Carbon::setLocale('fr');
    $new_date = Carbon::createFromDate($date);
    $new_date_format = $new_date->day . ' ' . $new_date->monthName . ' ' . $new_date->year;
    return $new_date_format;
}

function getFormattedTime($date): String
{
    Carbon::setLocale('fr');
    $new_date = Carbon::createFromDate($date);
    if (Str::length($new_date->minute) == 1) {
        $prefix = '0';
    } else {
        $prefix = '';
    }
    $new_date_format = $new_date->hour . ' h ' . $prefix . $new_date->minute . ' min ';
    return $new_date_format;
}

function getFormattedDateTime($date): String
{
    Carbon::setLocale('fr');
    $new_date = Carbon::createFromDate($date);
    if (Str::length($new_date->minute) == 1) {
        $prefix = '0';
    } else {
        $prefix = '';
    }
    $new_date_format = $new_date->day . ' ' . $new_date->monthName . ' ' . $new_date->year . ' à ' . $new_date->hour . 'h' . $prefix . $new_date->minute . 'min';
    return $new_date_format;
}

function getDateDiff($originalTime, $targedTime)
{
    $originalTime = new DateTimeImmutable($originalTime);
    $targedTime = new DateTimeImmutable($targedTime);
    $interval = $originalTime->diff($targedTime);
    $interval = $interval->format("%a");
    return intval($interval);
}

/**
 * Retourne la distance en metre ou kilometre (si $unit = 'k') entre deux latitude et longitude fournit
 */
function distance($lat1, $lng1, $lat2, $lng2, $unit = 'k')
{
    $earth_radius = 6371000;   // Terre = sphère de 6 371km de rayon
    $rlo1 = deg2rad($lng1);
    $rla1 = deg2rad($lat1);
    $rlo2 = deg2rad($lng2);
    $rla2 = deg2rad($lat2);
    $dlo = ($rlo2 - $rlo1) / 2;
    $dla = ($rla2 - $rla1) / 2;
    $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo));
    $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
    //
    $meter = ($earth_radius * $d);
    if ($unit == 'k') {
        return $meter / 1000;
    }
    return $meter;
}
