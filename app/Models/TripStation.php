<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripStation extends Model
{
    use HasFactory;
    protected $fillable = ['trip_id', 'station_id', 'order', 'number'];

    public function booking()
    {
        return $this->hasMany(booking::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

}
