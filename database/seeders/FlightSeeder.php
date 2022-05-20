<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Flight::factory()->create(['destination_id' => 2, 'origin_id' => 1, 'departure_time' => now('America/Bogota')->addHours(25), 'arrival_time' => now('America/Bogota')->addHours(26), 'is_international' => 0]);
        Flight::factory()->create(['destination_id' => 1, 'origin_id' => 2, 'departure_time' => now('America/Bogota')->addHours(49), 'arrival_time' => now('America/Bogota')->addHours(50), 'is_international' => 0]);
        Flight::factory(10)->create();
    }
}
