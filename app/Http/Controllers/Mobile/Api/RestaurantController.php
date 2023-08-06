<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Maize\Markable\Models\Favorite;
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
                'tableTypes',
                'user',
            ])
            ->with('city');


        // Return Response
        return response()->success(
            'this is all Restaurants',
            [
                "restaurants" => RestaurantResource::collection((clone $restaurants)->simplePaginate(request()->perPage ?? $restaurants->count())),
            ]
        );
    }


    public function show(Restaurant $restaurant)
    {
        $restaurant->load('user', 'city', 'tableTypes');
        // Return Response
        return response()->success(
            'this is your restaurant',
            [
                "restaurant" => new RestaurantResource($restaurant),
            ]
        );
    }

    public function assignFavourite(Restaurant $restaurant)
    {
        $user = Auth::guard('api_user')->user();

        Favorite::toggle($restaurant, $user);
        return response()->success(
            'this is your restaurant',
            [
                "restaurant" => new RestaurantResource($restaurant),
            ]
        );
    }
}
