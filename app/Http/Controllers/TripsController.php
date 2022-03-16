<?php

namespace App\Http\Controllers;

use App\Models\Scooters;
use App\Models\Trips;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    : JsonResponse
    {
        $trips = Trips::all()->toArray();

        if (count($trips) > 0) {
            return $this->sendResponse($trips, "List fetched successfully");
        }

        return $this->sendResponse($trips, "No trips available");
    }

    /**
     * Display a listing of the trips with trip updates.
     *
     * @todo We can paginate here using Laravel's function paginate obviously there will be much data here.
     *
     * @return JsonResponse
     */
    public function getTripsWithUpdates()
    : JsonResponse
    {

        $tripsWithUpdate = Trips::whereDate('ride_finish_time', '<=', now()->format('Y-m-d'))
            ->orderBy('ride_finish_time', 'desc')->get()->toArray();

        if (count($tripsWithUpdate) > 0) {
            return $this->sendResponse($tripsWithUpdate, "List fetched successfully");
        }

        return $this->sendResponse($tripsWithUpdate, "No trips available");


        // Pagination query in case of showing paginated records
        /* return Trips::with(['alltripupdates.trip'])
             ->whereDate('ride_finish_time', '<=', now()->format('Y-m-d'))
             ->orderBy('ride_finish_time', 'desc')->paginate(5);*/
    }

    /**
     * Display a listing of the trips with trip updates.
     *
     * @param $trip_id
     * @return JsonResponse
     */
    public function getTripWithTripIdUpdates($trip_id)
    : JsonResponse {
        $getTripWithTripIdUpdates = Trips::whereDate('ride_finish_time', '<=', now()->format('Y-m-d'))
            ->where('trips.trips_id', '=', $trip_id)
            ->orderBy('ride_finish_time', 'desc')->get()->toArray();

        if (count($getTripWithTripIdUpdates) > 0) {
            return $this->sendResponse($getTripWithTripIdUpdates, "List fetched successfully");
        }

        return $this->sendResponse($getTripWithTripIdUpdates, "No trips available");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    : JsonResponse {
        $input = $request->all();

        $findExistingEvent = Trips::where('scooter_uuid', '=', $input[ 'scooter_uuid' ])
            ->where('user_uuid', '=', $input[ 'user_uuid' ])
            ->where('event_type', '=', 'start')->get()->toArray();


        if ($input[ 'event_type' ] == 'start' ) {
            // When trip starts update scooter status and lat/long in scooters table to make it busy
            Scooters::where('uid', $input[ 'scooter_uuid' ])->update(['is_occupied' => 1]);
            if (count($findExistingEvent) > 0) {
                $trip = [];
                $message = 'Trip already started.';
            } else {
                $input[ 'trips_id' ] = "TUID" . rand(111, 999);
                $trip = Trips::create($input);
                $message = 'Trip started successfully.';
            }


        } else {
            // When trip ends update scooter status and lat/long in scooters table to make it available to new location
            Scooters::where('uid', $input[ 'scooter_uuid' ])->update([
                'is_occupied' => 0,
                'lat'         => $input[ 'finish_lat' ],
                'long'        => $input[ 'finish_long' ]
            ]);

            $trip    = Trips::where('trips_id', $input[ 'trip_id' ])
                ->update([
                    'ride_finish_time' => $input[ 'ride_finish_time' ],
                    'finish_lat'       => $input[ 'finish_lat' ],
                    'finish_long'      => $input[ 'finish_long' ],
                    'event_type'       => 'end',

                ]);
            $message = 'Trip ended successfully.';
        }

        return $this->sendResponse($trip, $message);
    }
}
