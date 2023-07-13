<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\City\StoreCityRequest;
use App\Http\Requests\Dashboard\City\UpdateCityRequest;
use App\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CityController extends Controller
{
    public function index(): View
    {
        // Get Data
        $cities = City::latest()->get();

        return view(
            'dashboard.pages.city.index',
            compact('cities')
        );
    }


    public function store(StoreCityRequest $request): RedirectResponse
    {
        // Store City
        $city = City::create($request->validated());


        // Return Response
        return back();

    }


    public function update(UpdateCityRequest $request, City $city): RedirectResponse
    {
        // Update City
        $city->update($request->validated());


        // Return Response
        return back();
    }

    public function destroy(City $city): RedirectResponse
    {
        // Delete City
        $city->delete();

        // Return Response
        return back();
    }
}
