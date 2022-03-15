<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'trip_id',
        'user_uuid',
        'scooter_uuid',
        'ride_start_time',
        'ride_finish_time',
        'start_lat',
        'start_long',
        'finish_lat',
        'finish_long',
    ];
}
