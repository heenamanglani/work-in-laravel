<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TripUpdates extends Model
{
    use HasFactory;

    /**
     *  Table name in DB
     * @var string
     */
    public $table = 'trip_updates';

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
        'id',
        'trips_id',
        'lat',
        'long'
    ];

    /**
     * @return BelongsTo
     */
    public function trips()
    : BelongsTo
    {
        return $this->belongsTo(Trips::class, 'trips_id');
    }
}
