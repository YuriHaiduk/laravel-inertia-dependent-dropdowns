<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\City;
use App\Models\Country;
use Inertia\Inertia;

class FormController extends Controller
{

    public function index()
    {
        $countries = Country::get(['id', 'name']);
        return Inertia::render('Form/Index', [
            'countries' => $countries,
        ]);

    }

    public function getCities($countryId)
    {
        $cities = City::where('country_id', $countryId)->get(['id', 'name']);
        return response()->json($cities);

    }

    public function getAirports($cityId)
    {
        $airports = Airport::where('city_id', $cityId)->get(['id', 'name']);
        return response()->json($airports);

    }
}
