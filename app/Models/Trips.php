<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trips extends Model
{
    use HasFactory;

    /**
     *  Table name in DB
     * @var string
     */
    public $table = 'trips';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'trips_id',
        'user_uuid',
        'scooter_uuid',
        'ride_start_time',
        'ride_finish_time',
        'start_lat',
        'start_long',
        'finish_lat',
        'finish_long',
        'event_type'
    ];

    /**
     * @return BelongsTo
     */
    public function scooter()
    : BelongsTo
    {
        return $this->belongsTo(Scooters::class, 'scooter_uuid');
    }

    /**
     * @return BelongsTo
     */
    public function user()
    : BelongsTo
    {
        return $this->belongsTo(Users::class, 'user_uuid');
    }

    /**
     * Get all trips updates for one trip
     *
     * @return HasMany
     */
    public function alltripupdates()
    : HasMany
    {
        return $this->hasMany(TripUpdates::class, 'trips_id');
    }

}
