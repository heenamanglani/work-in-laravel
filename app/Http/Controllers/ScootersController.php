<?php

namespace App\Http\Controllers;

use App\Models\Scooters;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ScootersController extends Controller
{
    /**
     * Display a listing of the scooters.
     *
     * @return void
     */
    public function index()
    {
        return Scooters::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function createOrUpdate(Request $request)
    : Response {
        return Scooters::updateOrCreate([
            'uuid' => $request->get('uuid')
        ], [
            'is_occupied' => $request->get('is_occupied')
        ]);
    }

    /**
     * fetch all the occupied scooters
     *
     * @return Collection
     */
    public function fetchAllOccupiedScooters()
    : Collection
    {
        return DB::table("scooters")->where("is_occupied", '=', 1)->get();
    }

    /**
     * fetch all the free scooters
     *
     * @return Collection
     */
    public function fetchAllFreeScooters()
    : Collection
    {
        return DB::table("scooters")->where("is_occupied", '=', 0)->get();
    }

    /**
     * Find scooters between lat and long and by filter if provided
     *
     * @TODO - I could have stored lat long as a POINT(lat, long) so by using spatial distance query it would have
     *       been easier and smaller query and effective
     *
     * @param Request $request
     * @param null $filter
     * @return array
     */
    public function findScootersWithinRange(Request $request, $filter = null,)
    : array {
        $lat1  = $request->get("lat1");
        $long1 = $request->get("long1");
        $lat2  = $request->get("lat2");
        $long2 = $request->get("long2");
        if ($filter == 'is_free') {
            return DB::select('SELECT id, uid, is_occupied,
                                ( 3959 * acos(
                                cos( radians(' . $lat2 . ') )
                              * cos( radians( ' . $lat1 . ' ) )
                              * cos( radians( ' . $long1 . ' ) - radians(' . $long2 . ') )
                              + sin( radians(' . $lat2 . ') )
                              * sin( radians( ' . $lat1 . ' ) )
                              ) ) AS distance
                               FROM scooters Where is_occupied = 0 LIMIT 0 , 20');
        } elseif ($filter == 'is_occupied') {
            return DB::select('SELECT id, uid, is_occupied,
                                ( 3959 * acos(
                                cos( radians(' . $lat2 . ') )
                              * cos( radians( ' . $lat1 . ' ) )
                              * cos( radians( ' . $long1 . ' ) - radians(' . $long2 . ') )
                              + sin( radians(' . $lat2 . ') )
                              * sin( radians( ' . $lat1 . ' ) )
                              ) ) AS distance
                               FROM scooters Where is_occupied = 1 LIMIT 0 , 20');
        } else {
            return DB::select('SELECT id, uid, is_occupied,
                                ( 3959 * acos(
                                cos( radians(' . $lat2 . ') )
                              * cos( radians( ' . $lat1 . ' ) )
                              * cos( radians( ' . $long1 . ' ) - radians(' . $long2 . ') )
                              + sin( radians(' . $lat2 . ') )
                              * sin( radians( ' . $lat1 . ' ) )
                              ) ) AS distance
                               FROM scooters LIMIT 0 , 20');
        }
    }

}
