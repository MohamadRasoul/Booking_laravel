<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CityController extends Controller
{
    public function index()
    {
        // Get Data
        $cities = City::latest()->get();

        // OR with filter

        // $cities = QueryBuilder::for(City::class)
        //     ->allowedFilters([
        //         "test_id",
        //         AllowedFilter::exact('test_id'),
        //     ])->get();


        // Return Response
        return response()->success(
            'this is all cities',
            [
                "cities" => CityResource::collection($cities),
            ]
        );
    }


    public function store(StoreCityRequest $request)
    {
        // Store City
        $city = City::create($request->validated());


        // Add Image to City
        $city
            ->addMediaFromRequest('image')
            ->toMediaCollection('City');

        // Return Response
        return response()->success(
            'city is added success',
            [
                "city" => new CityResource($city),
            ]
        );
    }


    public function show(City $city)
    {
        // Return Response
        return response()->success(
            'this is your city',
            [
                "city" => new CityResource($city),
            ]
        );
    }

    public function update(UpdateCityRequest $request, City $city)
    {
        // Update City
        $city->update($request->validated());


        // Edit Image for  City if exist
        $request->hasFile('image') &&
            $city
            ->addMediaFromRequest('image')
            ->toMediaCollection('City');



        // Return Response
        return response()->success(
            'city is updated success',
            [
                "city" => new CityResource($city),
            ]
        );
    }

    public function destroy(City $city)
    {
        // Delete City
        $city->delete();

        // Return Response
        return response()->success('city is deleted success');
    }
}
