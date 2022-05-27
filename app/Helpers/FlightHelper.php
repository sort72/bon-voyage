<?php

namespace App\Helpers;

use App\Models\Cart;
use App\Models\Flight;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
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
            if($class == 'first_class') {
                $number_min = 1;
                $number_max = 6;
                $letter_max = 7;
            }
            else {
                $number_min = 7;
                $number_max = 31;
                $letter_max = 7;
            }
        }
        else {
            if($class == 'first_class') {
                $number_min = 1;
                $number_max = 4;
                $letter_max = 5;
            }
            else {
                $number_min = 5;
                $number_max = 25;
                $letter_max = 5;
            }
        }

        $letter_min = 0;
        $letters = ["A", "B", "C", "D", "E", "F", "G", "H"];

        do {
            $letter = $letters[random_int($letter_min, $letter_max)];
            $number = 0;
            if($flight->is_international)
            {
                if($letter =='A' || $letter =='B')
                {
                    if($class == 'first_class')
                        $number = random_int($number_min, 7);
                    else
                        $number = random_int(8,32);
                }
                else
                {
                    $number = random_int($number_min, $number_max);
                }
            }
            else
            {
                if($letter =='A')
                {
                    if($class == 'first_class')
                        $number = random_int($number_min, 5);
                    else
                        $number = random_int(6,$number_max);
                }
                else
                {
                    $number = random_int($number_min, $number_max);
                }
            }

            $seat = $letter.$number;

            $seat_taken = Ticket::where('flight_id', $flight->id)->where('seat', $seat)->first();

        } while ($seat_taken);

        return $seat;
    }

    public static function getTotalSeats($is_international)
    {
        if($is_international == 1) {
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
                $query->where('type', 'economy_class')
                        ->whereIn('status', ['paid', 'reserved']);
            },
            'tickets as occupied_first_class_seats' => function(Builder $query) {
                $query->where('type', 'first_class')
                        ->whereIn('status', ['paid', 'reserved']);
            },
        ]);

        $available_seats = self::getTotalSeats($flight->is_international);

        $available_seats['first_class'] -= $flight->occupied_first_class_seats;
        $available_seats['economy_class'] -= $flight->occupied_economy_seats;
        $available_seats['total'] = $available_seats['total'] - $flight->occupied_first_class_seats - $flight->occupied_economy_seats;

        return $available_seats;

    }

    public static function createTickets(Request $request, Cart $cart, $status)
    {
        $flight = Flight::find($request->flight_id);
        $price = $flight->economy_class_price;
        if($request->flight_class == 'first_class') {
            $price = $flight->first_class_price;
        }

        $inbound_flight = null;
        $inbound_flight_price = 0;
        if($request->inbound_flight_id) {
            $inbound_flight = Flight::find($request->inbound_flight_id);
            $inbound_flight_price = $inbound_flight->economy_class_price;
            if($request->flight_class == 'first_class') {
                $inbound_flight_price = $inbound_flight->first_class_price;
            }
        }

        foreach ($request->adult_dni as $key => $adult) {
            $data = [
                'flight_id' => $request->flight_id,
                'cart_id' => $cart->id,
                'type' => $request->flight_class,
                'reservation_code' => FlightHelper::generateReservationCode(),
                'status' => $status,
                'price' => $price,
                'seat' => FlightHelper::getAvailableSeat($flight, $request->flight_class),
                'passenger_document' => $request->adult_dni[$key],
                'passenger_email' => $request->adult_email[$key],
                'passenger_name' => $request->adult_name[$key],
                'passenger_surname' => $request->adult_surname[$key],
                'passenger_birth_date' => $request->adult_birth_date[$key],
                'passenger_gender' => $request->adult_gender[$key],
                'passenger_phone' => $request->adult_phone[$key],
                'emergency_name' => $request->adult_emergency_name[$key],
                'emergency_contact' => $request->adult_emergency_contact[$key],
            ];
            // dump($data);
            Ticket::create($data);

            if($request->inbound_flight_id) {
                $data['flight_id'] = $request->inbound_flight_id;
                $data['price'] = $inbound_flight_price;
                $data['reservation_code'] = FlightHelper::generateReservationCode();
                $data['seat'] = FlightHelper::getAvailableSeat($inbound_flight, $request->flight_class);
                // dump($data);
                Ticket::create($data);
            }
        }

        if($request->child_dni) {
            // dump('CHILD');
            foreach ($request->child_dni as $key => $child) {
                $data = [
                    'flight_id' => $request->flight_id,
                    'cart_id' => $cart->id,
                    'type' => $request->flight_class,
                    'reservation_code' => FlightHelper::generateReservationCode(),
                    'status' => $status,
                    'price' => $price,
                    'seat' => FlightHelper::getAvailableSeat($flight, $request->flight_class),
                    'passenger_document' => $request->child_dni[$key],
                    'passenger_email' => $request->adult_email[0],
                    'passenger_name' => $request->child_name[$key],
                    'passenger_surname' => $request->child_surname[$key],
                    'passenger_birth_date' => $request->child_birth_date[$key],
                    'passenger_gender' => $request->child_gender[$key],
                    'passenger_phone' => $request->adult_phone[0],
                    'emergency_name' => $request->child_emergency_name[$key],
                    'emergency_contact' => $request->child_emergency_contact[$key],
                ];
                // dump($data);
                Ticket::create($data);

                if($request->inbound_flight_id) {
                    $data['flight_id'] = $request->inbound_flight_id;
                    $data['price'] = $inbound_flight_price;
                    $data['reservation_code'] = FlightHelper::generateReservationCode();
                    $data['seat'] = FlightHelper::getAvailableSeat($inbound_flight, $request->flight_class);
                    // dump($data);
                    Ticket::create($data);
                }
            }
        }
    }
}
