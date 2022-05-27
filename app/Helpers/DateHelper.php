<?php

namespace App\Helpers;

use App\Models\Flight;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class DateHelper
{
    public static function beautify($date, $format = 'complete', $apply_timezone = true)
    {
        if (is_null($date)) return "";

        if (!$date instanceof Carbon) {
            $date = Carbon::parse($date);
        }

        if($apply_timezone) $date = $date->timezone('America/Bogota');

        switch ($format) {
            case 'diff':
                $beauty = $date->diffForHumans();
                break;

            case 'diff_day_added':
                $beauty = $date->addDay()->diffForHumans();
                break;

            case 'time':
                $beauty = $date->translatedFormat('h:i a');
                break;

            case 'day_week':
                $beauty = $date->translatedFormat('l');
                break;

            case 'day':
                $beauty = $date->translatedFormat('j');
                break;

            case 'day_month':
                $beauty = $date->translatedFormat('j \d\e F');
                break;

            case 'weekday_month':
                $beauty = $date->translatedFormat('l j \d\e F');
                break;

            case 'weekday_month_year':
                $beauty = $date->translatedFormat('l j \d\e F \d\e Y');
                break;

            case 'month_year':
                $beauty = $date->translatedFormat('F \d\e Y');
                break;

            case 'complete':
                $beauty = $date->translatedFormat('j \d\e F \d\e Y');
                break;

            case 'complete_with_time':
                $beauty = $date->translatedFormat('j \d\e F \d\e Y \a \l\a\s g:i a');
                break;

            case 'short_complete':
                $beauty = $date->translatedFormat('d/m/Y');
                break;

            case 'short_complete_with_time':
                $beauty = $date->translatedFormat('d/m/Y g:i a');
                break;
        }

        return $beauty;
    }

    /**
     * Al filtrar una fecha hay que añadirle 5 horas para poder consultarla en la base de datos comparando con la fecha que se guardó
     * No sirve usar timestamp America/Bogota porque eso seria a la inversa
     * Ej: Al filtrar vuelos del 27 de mayo se aplica el filtro desde 00:00:00 a 23:59:59, pero si hay un vuelo el 27 a las 20:22:00 eso en utc sería 03:22:00,
     * por eso toca sumar 5 horas al 23:59:59, para conocer el verdadero inicio y fin del día en la hora colombia
     */
    public static function addColombiaDifference($date)
    {
        if (is_null($date)) return "";

        if (!$date instanceof Carbon) {
            $date = Carbon::parse($date);
        }

        return $date->addHours(5);
    }
}
