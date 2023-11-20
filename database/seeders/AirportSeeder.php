<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = City::get(['id', 'name']);
        foreach ($cities as $city) {
            $numberOfAirports = rand(1, 3);
            for ($i = 1; $i <= $numberOfAirports; $i++) {
                $city->airports()->create([
                    'city_id' => $city->id,
                    'name' => 'Airport ' . $i . ' in ' . $city->name,
                ]);
            }
        }
    }
}
