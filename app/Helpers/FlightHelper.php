<?php

namespace App\Helpers;

use App\Models\Flight;
use Illuminate\Support\Str;

class FlightHelper
{
    public static function generateName()
    {
        do {
            $name = Str::upper(Str::random(6));

            $name_taken = Flight::withTrashed()->where('name', $name)->first();

        } while ($name_taken);

        return $name;

    }
}
