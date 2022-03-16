<?php

namespace Tests\Feature;

use Tests\TestCase;

class TripUpdatesTest extends TestCase
{
    /**
     * send periodic trip updates of an ongoing trip
     *
     * @return void
     */
    public function test_start_trip_ride()
    {
        $headers = ['Accept' => 'application/json', 'api_token' => 'p2lbgWkFrykA4QyUmpHihzmc5BNzIABq'];

        $payload = [
            "lat"       => 45.4193028,
            "long"      => -75.7056152,
        ];

        $this->json('POST', 'api/trips/TUID594/sendupdates', $payload, $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' =>
                    [
                        "lat",
                        "long",
                        "trips_id",
                        "updated_at",
                        "created_at"
                    ]

            ]);
    }
}
