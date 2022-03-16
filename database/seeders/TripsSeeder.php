<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('trips')->insert([
                'trips_id'         => "TUID" . $i . $i . $i,
                'scooter_uuid'     => 'c72065a6-5c5a-4efc-9ff2-75f7af0c89a' . $i,
                'user_uuid'        => '84111ed1-de60-4b09-a0da-c06aa674fa1' . $i,
                "event_type"       => "end",
                "ride_start_time"  => "2022-03-15 22:00:00",
                "ride_finish_time" => date('Y-m-d H:i:s'),
                "start_lat"        => 45.4193028,
                "start_long"       => -75.7056152,
                "finish_lat"       => 45.4176498,
                "finish_long"      => -75.71111930000001,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s')
            ]);
        }
    }
}
