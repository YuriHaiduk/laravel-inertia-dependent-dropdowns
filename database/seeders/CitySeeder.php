<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = Country::all();
        foreach ($countries as $country) {
            for ($i = 1; $i < 10; $i++) {
                $country->cities()->create([
                    'country_id' => $country->id,
                    'name' => fake()->city,
                ]);
            }
        }
    }
}
