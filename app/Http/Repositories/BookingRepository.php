<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\BookingInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Booking;
use App\Models\Trip;
use App\Models\TripStation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingRepository implements BookingInterface
{
    use ApiResponseTrait;
    private $bookingModel;
    public function __construct(Booking $booking)
    {
        $this->bookingModel = $booking;
    }

    public function booking(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'start_station' => 'required',
            'end_station' => 'required',
            'user_id' => 'required'

        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        $tripId = TripStation::where('trip_stations.station_id', $request->start_station)
            ->join('trip_stations as t1', 'trip_stations.trip_id', '=', 't1.trip_id')
            ->where('t1.station_id', $request->end_station)
            ->where('trip_stations.order', '>', 't1.order')
            ->select('t1.trip_id')
            ->get();
            if (count($tripId) == 0) {
                return response()->json('Trip Not Available');
            }
        $tripId = $tripId[0]->trip_id;
        $startOrder = TripStation::where('station_id', $request->start_station)->where('trip_id',$tripId )->select('order')->get();
        $startOrder = $startOrder[0]->order;
        $endOrder = TripStation::where('station_id', $request->end_station)->where('trip_id',$tripId )->select('order')->get();
        $endOrder = $endOrder[0]->order;
        $availability = TripStation::where('trip_id', $tripId)->where('order', '>=', $startOrder)->where('order', '<', $endOrder)->where('number', '<>', 0)->get();
        if (count($availability) == 0) {
            return response()->json('No Seat Available');
        }
        $tripStations = TripStation::where('trip_id', $tripId )->where('order', '>=', $startOrder)
        ->where('order', '<', $endOrder);
        $tripStations->decrement('number', 1);
        Booking::create([
            'user_id' =>$request->user_id,
            'trip_id' =>$tripId,
            'trip_station_start' => $request->trip_start_station,
            'trip_station_end' => $request->trip_end_station,
            'status' => true
        ]);
        return response()->json('booking is successful');
    }
}
