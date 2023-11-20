<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;
use Inertia\Response;

class FormController extends Controller
{

    public function index(): Response
    {
        $countries = Country::query()->get(['id', 'name']);
        return Inertia::render('Form/Index', [
            'countries' => $countries,
        ]);

    }

    public function getCities($countryId): JsonResponse
    {
        $cities = City::query()->where('country_id', $countryId)->get(['id', 'name']);
        return response()->json($cities);

    }

    public function getAirports($cityId): JsonResponse
    {
        $airports = Airport::query()->where('city_id', $cityId)->get(['id', 'name']);
        return response()->json($airports);

    }
}
