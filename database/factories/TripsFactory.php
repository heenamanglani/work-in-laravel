<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory
 */
class TripsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'trips_id'         => "TUID111",
            'scooter_uuid'     => 'c72065a6-5c5a-4efc-9ff2-75f7af0c89a1',
            'user_uuid'        => '84111ed1-de60-4b09-a0da-c06aa674fa11',
            "event_type"       => "end",
            "ride_start_time"  => "2022-03-15 22:00:00",
            "ride_finish_time" => date('Y-m-d H:i:s'),
            "start_lat"        => 45.4193028,
            "start_long"       => -75.7056152,
            "finish_lat"       => 45.4176498,
            "finish_long"      => -75.71111930000001,
            'created_at'       => date('Y-m-d H:i:s'),
            'updated_at'       => date('Y-m-d H:i:s')
        ];
    }
}
