<?php

namespace Tests\Feature;

use Tests\TestCase;

class TripsTest extends TestCase
{
    /**
     * A test to get all trips from DB.
     *
     * @return void
     */
    public function test_get_all_trips()
    {
        $headers = ['Accept' => 'application/json', 'api_token' => 'p2lbgWkFrykA4QyUmpHihzmc5BNzIABq'];
        $this->json('GET', 'api/trips', [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    '*' =>
                        [
                            "user_uuid",
                            "scooter_uuid",
                            "ride_start_time",
                            "start_lat",
                            "start_long",
                            "event_type",
                            "trips_id",
                            "updated_at",
                            "created_at"
                        ]
                ]
            ]);
    }

    /**
     * A test to get all trips from DB.
     *
     * @return void
     */
    public function test_start_trip_ride()
    {
        $headers = ['Accept' => 'application/json', 'api_token' => 'p2lbgWkFrykA4QyUmpHihzmc5BNzIABq'];

        $payload = [
            'scooter_uuid'    => 'c72065a6-5c5a-4efc-9ff2-75f7af0c89a1',
            'user_uuid'       => '84111ed1-de60-4b09-a0da-c06aa674fa11',
            "event_type"      => "start",
            "ride_start_time" => "2022-03-15 22:00:00",
            "start_lat"       => 45.4193028,
            "start_long"      => -75.7056152,
            'created_at'      => date('Y-m-d H:i:s'),
            'updated_at'      => date('Y-m-d H:i:s')
        ];

        $this->json('POST', 'api/trips', $payload, $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' =>
                    [
                        "user_uuid",
                        "scooter_uuid",
                        "ride_start_time",
                        "start_lat",
                        "start_long",
                        "event_type",
                        "trips_id",
                        "updated_at",
                        "created_at"
                    ]

            ]);
    }

    /**
     * A test to end trip.
     *
     * @return void
     */
    public function test_end_trip_ride()
    {
        $headers = ['Accept' => 'application/json', 'api_token' => 'p2lbgWkFrykA4QyUmpHihzmc5BNzIABq'];

        $payload = [
            "scooter_uuid"     => 'c72065a6-5c5a-4efc-9ff2-75f7af0c89a1',
            "user_uuid"        => '84111ed1-de60-4b09-a0da-c06aa674fa11',
            "event_type"       => "end",
            "ride_finish_time" => "2022-03-15 22:00:00",
            "finish_lat"       => 45.4193028,
            "finish_long"      => -75.7056152,
            "trip_id"          => "TUID594"
        ];

        $this->json('POST', 'api/trips', $payload, $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'success',
                'message'
            ]);

        //toDo - We cna mock the data to test Models - for future
        //$ScooterPayload = ['is_oocupied' => 0, 'lat' => 45.4193028, 'long' => -75.7056152];

        $this->json('POST', 'api/trips', $payload, $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'success',
                'message'
            ]);

    }
}
