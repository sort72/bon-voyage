<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Destination::factory()->create(['name' => 'Pereira', 'timezone' => 'America/Bogota']);
        Destination::factory()->create(['name' => 'Bogotá', 'timezone' => 'America/Bogota']);
        Destination::factory()->create(['name' => 'Medellín', 'timezone' => 'America/Bogota']);
        Destination::factory()->create(['name' => 'Cali', 'timezone' => 'America/Bogota']);
        Destination::factory()->create(['name' => 'Cartagena', 'timezone' => 'America/Bogota']);
        Destination::factory()->create(['name' => 'Madrid', 'timezone' => 'Europe/Madrid']);
        Destination::factory()->create(['name' => 'Londres', 'timezone' => 'Europe/London']);
        Destination::factory()->create(['name' => 'New York', 'timezone' => 'America/New_York']);
        Destination::factory()->create(['name' => 'Buenos Aires', 'timezone' => 'America/Buenos_Aires']);
        Destination::factory()->create(['name' => 'Miami', 'timezone' => 'America/New_York']);
    }
}
