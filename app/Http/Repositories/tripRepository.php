<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\tripInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Models\TripStation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class tripRepository implements tripInterface
{
    use ApiResponseTrait;
    private $tripStationModel;
    public function __construct( TripStation $tripStation)
    {
        $this->tripStationModel = $tripStation;
    }
    public function show(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'start_station' => 'required',
            'end_station' => 'required',

        ]);
        if ($validate->fails()) {
            return $this->apiresponse(200, null, $validate->errors(), null);
        }
        $tripId = $this->tripStationModel::where('trip_stations.station_id', $request->start_station)
            ->join('trip_stations as t1', 'trip_stations.trip_id', '=', 't1.trip_id')
            ->where('t1.station_id', $request->end_station)
            ->where('trip_stations.order', '>', 't1.order')
            ->select('t1.trip_id')
            ->get();
            if (count($tripId) == 0) {
                return $this->apiresponse(200,'Trip Not Available', null, $tripId);
            }
        $tripId = $tripId[0]->trip_id;
        $startOrder = $this->tripStationModel::where('station_id', $request->start_station)->where('trip_id',$tripId )->select('order')->get();
        $startOrder = $startOrder[0]->order;
        $endOrder = $this->tripStationModel::where('station_id', $request->end_station)->where('trip_id',$tripId )->select('order')->get();
        $endOrder = $endOrder[0]->order;
        $availability = $this->tripStationModel::where('trip_id', $tripId)->where('order', '>=', $startOrder)->where('order', '<', $endOrder)->where('number', '<>', 0)->get();
        if (count($availability) <= 0) {
            return $this->apiresponse(200,'No Seat Available', null, $availability);
        }
        $tripStations = $this->tripStationModel::where('trip_id', $tripId )->where('order', '>=', $startOrder)
        ->where('order', '<', $endOrder)->min('number');


        return $this->apiresponse(200, null, null, $tripStations);
    }






}
