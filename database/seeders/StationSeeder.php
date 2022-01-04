<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = ['Cairo', 'Giza', 'AlFayoum', 'Alminya', 'Asyut'];
        foreach ($stations as $station) {
            Station::create([
                'name' => $station
            ]);
        }
    }
}
