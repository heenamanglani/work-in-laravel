<?php

namespace App\Http\Controllers;

use App\Models\Scooters;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

}
