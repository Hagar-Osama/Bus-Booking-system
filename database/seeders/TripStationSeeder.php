<?php

namespace Database\Seeders;

use App\Models\TripStation;
use Illuminate\Database\Seeder;

class TripStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $TripStations = [
            [
                'station_id' => 1,
                'trip_id' => 1,
                'order' => 1,
                'number' => 12
            ],
            [
                'station_id' => 2,
                'trip_id' => 1,
                'order' => 2,
                'number' => 12
            ],
            [
                'station_id' => 3,
                'trip_id' => 1,
                'order' => 3,
                'number' => 12
            ],
            [
                'station_id' => 4,
                'trip_id' => 1,
                'order' => 4,
                'number' => 12
            ],
            [
                'station_id' => 5,
                'trip_id' => 1,
                'order' => 5,
                'number' => 12
            ],
        ];
        foreach ($TripStations as $TripStation) {
            TripStation::create([
                'station_id' =>$TripStation['station_id'],
                'trip_id' =>$TripStation['trip_id'],
                'order' =>$TripStation['order'],
                'number' =>$TripStation['number']
            ]);
        }
    }
}
