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
        // Users::factory(10)->create();
        $this->call([
            UserSeeder::class,
            ScootersTableSeeder::class,
            TripsSeeder::class,
            TripUpdatesSeeder::class,
        ]);

    }
}
