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
        Destination::factory()->create(['name' => 'Pereira']);
        Destination::factory()->create(['name' => 'Bogotá']);
        Destination::factory()->create(['name' => 'Medellín']);
        Destination::factory()->create(['name' => 'Cali']);
        Destination::factory()->create(['name' => 'Cartagena']);
        Destination::factory()->create(['name' => 'Madrid']);
        Destination::factory()->create(['name' => 'Londres']);
        Destination::factory()->create(['name' => 'New York']);
        Destination::factory()->create(['name' => 'Buenos Aires']);
        Destination::factory()->create(['name' => 'Miami']);
    }
}
