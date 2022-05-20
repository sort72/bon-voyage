<?php

namespace App\Helpers;

use App\Models\Flight;
use App\Models\Ticket;
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

    public static function generateReservationCode()
    {
        $code = random_int(1, 9) . Str::upper(Str::random(4)) . random_int(1, 9);

        return $code;

    }

    public static function getAvailableSeat(Flight $flight, $class)
    {
        if($flight->is_international) {
            if($class == 'economy_class') {
                $number_min = 1;
                $number_max = 50;
                $letter_max = 9;
            }
            else {
                $number_min = 51;
                $number_max = 70;
                $letter_max = 6;
            }
        }
        else {
            if($class == 'economy_class') {
                $number_min = 1;
                $number_max = 30;
                $letter_max = 6;
            }
            else {
                $number_min = 31;
                $number_max = 40;
                $letter_max = 3;
            }
        }

        $letter_min = 0;
        $letters = ["A", "B", "C", "D", "E", "F", "G", "H", "I" ];

        do {
            $seat = $letters[random_int($letter_min, $letter_max)] . random_int($number_min, $number_max);

            $seat_taken = Ticket::where('seat', $seat)->first();

        } while ($seat_taken);

        return $seat;
    }

    public static function getTotalSeats($is_international)
    {
        if($is_international) {
            return collect([
                'first_class' => 50,
                'economy_class' => 200,
                'total' => 250,
                'international' => true
            ]);
        }

        return collect([
            'first_class' => 25,
            'economy_class' => 125,
            'total' => 150,
            'international' => false
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
