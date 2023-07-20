<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RestaurantController extends Controller
{
    public function index()
    {
        // Get Data with filter

        $restaurants = QueryBuilder::for(Restaurant::class)
            ->allowedFilters([
                "name",
                AllowedFilter::exact('city_id'),
                AllowedFilter::exact('user_id'),
            ])
            ->allowedIncludes([
                'tableTypes'
            ])
            ->with('user', 'city')
            ->get();


        // Return Response
        return response()->success(
            'this is all Restaurants',
            [
                "restaurants" => RestaurantResource::collection($restaurants),
            ]
        );
    }


    public function show(Restaurant $restaurant)
    {
        $restaurant->load('admin', 'city', 'tableTypes');
        // Return Response
        return response()->success(
            'this is your restaurant',
            [
                "restaurant" => new RestaurantResource($restaurant),
            ]
        );
    }

}
