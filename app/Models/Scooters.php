<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scooters extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uid',
        'is_occupied',
        'lat',
        'long'
    ];

    /**
     * Get all trips for a single scooter
     *
     * @return HasMany
     */
    public function scootertrips()
    : HasMany
    {
        return $this->hasMany(Trips::class);
    }
}
