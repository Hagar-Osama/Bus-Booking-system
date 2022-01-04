<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = ['start_station', 'end_station', 'status'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function tripStations()
    {
        return $this->hasMany(TripStation::class);
    }

    public function tripSeats()
    {
        return $this->hasMany(TripSeat::class);
    }
}
