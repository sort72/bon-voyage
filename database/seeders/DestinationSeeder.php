<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Destination;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Destination::factory()->create(['city_id' => City::where('name', 'Pereira')->first()->id, 'timezone' => 'America/Bogota']);
        Destination::factory()->create(['city_id' => City::where('name', 'Bogota')->first()->id, 'timezone' => 'America/Bogota']);
        Destination::factory()->create(['city_id' => City::where('name', 'Medellín')->first()->id, 'timezone' => 'America/Bogota']);
        Destination::factory()->create(['city_id' => City::where('name', 'Cali')->first()->id, 'timezone' => 'America/Bogota']);
        Destination::factory()->create(['city_id' => City::where('name', 'Cartagena')->first()->id, 'timezone' => 'America/Bogota']);
        Destination::factory()->create(['city_id' => City::where('name', 'Madrid')->first()->id, 'timezone' => 'Europe/Madrid']);
        Destination::factory()->create(['city_id' => City::where('name', 'London')->first()->id, 'timezone' => 'Europe/London']);
        Destination::factory()->create(['city_id' => City::where('name', 'New York')->first()->id, 'timezone' => 'America/New_York']);
        Destination::factory()->create(['city_id' => City::where('name', 'Miami')->first()->id, 'timezone' => 'America/New_York']);
        Destination::factory()->create(['city_id' => City::where('name', 'Buenos Aires')->first()->id, 'timezone' => 'America/Buenos_Aires']);
    }
}
