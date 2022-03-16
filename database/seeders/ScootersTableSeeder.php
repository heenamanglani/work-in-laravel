<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScootersTableSeeder extends Seeder
{
    /**
     * Technically, using Faker is a right approach but to create a hardcoded API and response in postman, i chose to
     * create testable data - feel free to change if needed
     *
     * Run the database seeds.
     *
     * @return void
     */
    /*public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('scooters')->insert([
                'uid'         => Str::uuid()->toString(),
                'is_occupied' => rand(0, 1),
                'lat'         => '45.4177537',
                'long'        => '-75.7089187',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ]);
        }
    }*/

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('scooters')->insert([
                'uid'         => 'c72065a6-5c5a-4efc-9ff2-75f7af0c89a' . $i,
                'is_occupied' => rand(0, 1),
                'lat'         => '45.4177537',
                'long'        => '-75.7089187',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ]);
        }
    }
}
