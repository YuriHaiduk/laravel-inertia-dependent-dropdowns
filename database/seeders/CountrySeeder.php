<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = ['Ukraine', 'USA', 'UK', 'France', 'Italy'];

        foreach ($countries as $country) {
            Country::create(['name' => $country]);
        }
    }
}
