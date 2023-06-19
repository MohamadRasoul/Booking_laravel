<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\City\StoreCityRequest;
use App\Http\Requests\Dashboard\City\UpdateCityRequest;
use App\Models\City;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CityController extends Controller
{
    public function index()
    {
        // Get Data
        $cities = City::latest()->get();

        return view(
            'dashboard.pages.city.index',
            compact('cities')
        );
    }


    public function store(StoreCityRequest $request)
    {
        // Store City
        $city = City::create($request->validated());


        // Return Response
        return back();

    }



    public function update(UpdateCityRequest $request, City $city)
    {
        // Update City
        $city->update($request->validated());


        // Return Response
        return back();
    }

    public function destroy(City $city)
    {
        // Delete City
        $city->delete();

        // Return Response
        return back();
    }
}
