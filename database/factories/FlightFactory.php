<?php

namespace Database\Factories;

use App\Helpers\FlightHelper;
use App\Helpers\LocationHelper;
use App\Models\Destination;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $destinations = Destination::inRandomOrder()->limit(2)->get();
        $departure_time = $this->faker->dateTimeInInterval('tomorrow', '+30 days', 'America/Bogota')->format('Y-m-d H:i:s');
        $is_international = ! LocationHelper::areDestinationsFromTheSameCountry($destinations[0]->id, $destinations[1]->id);
        $minutes_to_add = $this->faker->numberBetween(55, 120);
        if($is_international) $minutes_to_add = $this->faker->numberBetween(120, 500);

        return [
            'name' => FlightHelper::generateName(),
            'economy_class_price' => $this->faker->numberBetween(50, 250) * 1000,
            'first_class_price' => $this->faker->numberBetween(450, 900) * 1000,
            'origin_id' => $destinations[0]->id,
            'destination_id' => $destinations[1]->id,
            'is_international' => $is_international,
            'departure_time' => $departure_time,
            'arrival_time' => Carbon::parse($departure_time)->addMinutes($minutes_to_add),
        ];
    }
}
