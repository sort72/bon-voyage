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

    public static function getTotalSeats($is_international)
    {
        if($is_international) {
            return collect([
                'first_class' => 50,
                'economy_class' => 150,
                'total' => 200
            ]);
        }

        return collect([
            'first_class' => 25,
            'economy_class' => 125,
            'total' => 150
        ]);
    }
}
