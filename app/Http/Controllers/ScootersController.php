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
            'uuid' => $request->get('uuid' )
        ], [
            'is_occupied' => $request->get('is_occupied' )
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

}
