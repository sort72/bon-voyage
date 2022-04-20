<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'role' => 'root',
            'email' => 'root@bon-voyage.com'
        ]);

        \App\Models\User::factory()->create([
            'role' => 'admin',
            'email' => 'admin@bon-voyage.com'
        ]);

        $this->call(WorldTablesSeeder::class);
        $this->call(DestinationSeeder::class);
    }
}
