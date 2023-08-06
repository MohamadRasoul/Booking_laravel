<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use Spatie\QueryBuilder\QueryBuilder;

class CityController extends Controller
{
    public function index()
    {
        // Get Data with filter

        $cities = QueryBuilder::for(City::class)
            ->allowedFilters([
                "name",
            ]);


        return response()->success(
            'this is all cities',
            [
                "cities" => CityResource::collection((clone $cities)->simplePaginate(request()->perPage ?? $cities->count())),
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

}
