<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trips = [
            [
                'start_station' => 1,
                'end_station' => 5,
                'status' => false
            ],
        ];
        foreach ($trips as $trip) {
            Trip::create([
                'start_station' => $trip['start_station'],
                'end_station' => $trip['end_station'],
                'status' =>$trip['status']
            ]);
        }
    }
}
