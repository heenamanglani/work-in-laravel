<?php

namespace App\Http\Controllers;

use App\Models\Trips;
use App\Models\TripUpdates;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TripUpdatesController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param $trip_id
     * @return JsonResponse
     */
    public function sendPeriodicUpdates(Request $request, $trip_id)
    : JsonResponse {

        $input = $request->all();

        $alreadyEndedTrip = Trips::where('trip_id', '=', $trip_id)
            ->where('event_type', '=', 'end')->get()->toArray();

        if (count($alreadyEndedTrip) > 0) {
            $trip    = [];
            $message = 'Trip already ended';
        } else {
            $input['trips_id']  = $trip_id;
            $trip               = TripUpdates::create($input);
            $message            = 'Trip updates successfully updated.';
        }

        return $this->sendResponse($trip, $message);
    }

}
