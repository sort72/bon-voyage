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
}
