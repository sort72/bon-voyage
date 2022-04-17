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
        Destination::factory()->create(['city_id' => 70067, 'timezone' => 'America/Bogota']); // Pereira
        Destination::factory()->create(['city_id' => 761, 'timezone' => 'America/Bogota']); // Bogota
        Destination::factory()->create(['city_id' => 104277, 'timezone' => 'America/Bogota']); // Medellín
        Destination::factory()->create(['city_id' => 70171, 'timezone' => 'America/Bogota']); // Cali
        Destination::factory()->create(['city_id' => 70166, 'timezone' => 'America/Bogota']); // Cartagena
        Destination::factory()->create(['city_id' => 2311, 'timezone' => 'Europe/Madrid']); // Madrid
        Destination::factory()->create(['city_id' => 3732, 'timezone' => 'Europe/London']); // London
        Destination::factory()->create(['city_id' => 3609, 'timezone' => 'America/New_York']); // New York
        Destination::factory()->create(['city_id' => 3487, 'timezone' => 'America/New_York']); // Miami
        Destination::factory()->create(['city_id' => 69, 'timezone' => 'America/Buenos_Aires']); // Buenos Aires
    }
}
