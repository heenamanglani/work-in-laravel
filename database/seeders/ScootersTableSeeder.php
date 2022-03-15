<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ScootersTableSeeder extends Seeder
{
    /**
     * Run the database seeds to install 5 scooters.
     *
     * @return void
     */
    public function run()
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
    }
}
