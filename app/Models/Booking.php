<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'seat_id', 'trip_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function TripSeat()
    {
        return $this->belongsTo(TripSeat::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function tripStation()
    {
        return $this->belongsTo(TripStation::class);
    }
}
