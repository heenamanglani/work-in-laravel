<?php

use App\Http\Controllers\ScootersController;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\TripUpdatesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Using custom middleware to introduce Static API Token to validate API's
 */
Route::group(['middleware' => ['api_token']], function () {
    Route::get('/users', [UsersController::class, 'index']);
    Route::get('/scooters', [ScootersController::class, 'index']);
    Route::get('/scooters/occupied', [ScootersController::class, 'fetchAllOccupiedScooters']);
    Route::get('/scooters/free', [ScootersController::class, 'fetchAllFreeScooters']);
    Route::get('/trips/allupdates', [TripsController::class, 'getTripsWithUpdates']);
    Route::get('/trips/{trip_id}/allupdates', [TripsController::class, 'getTripWithTripIdUpdates']);
    Route::post('/trips/{trip_id}/sendupdates', [TripUpdatesController::class, 'sendPeriodicUpdates']);
    Route::resource('/trips', TripsController::class);
});
