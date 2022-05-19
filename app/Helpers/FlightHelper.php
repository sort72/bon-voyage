<?php

namespace App\Helpers;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Builder;
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

    public static function getFlightAvailableSeats(Flight $flight)
    {
        $flight->loadCount([
            'tickets as occupied_economy_seats' => function(Builder $query) {
                $query->where('type', 'economy_class');
            },
            'tickets as occupied_first_class_seats' => function(Builder $query) {
                $query->where('type', 'first_class');
            },
        ]);

        $available_seats = self::getTotalSeats($flight->is_international);

        $available_seats['first_class'] -= $flight->occupied_first_class_seats;
        $available_seats['economy_class'] -= $flight->occupied_economy_seats;
        $available_seats['total'] = $available_seats['total'] - $flight->occupied_first_class_seats - $flight->occupied_economy_seats;

        return $available_seats;

    }
}
