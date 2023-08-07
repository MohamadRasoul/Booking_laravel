<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource;
use App\Models\Hotel;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class HotelController extends Controller
{
    public function index()
    {
        // Get Data with filter

        $hotels = QueryBuilder::for(Hotel::class)
            ->allowedFilters([
                "name",
                AllowedFilter::exact('city_id'),
                AllowedFilter::exact('user_id'),
            ])
            ->allowedIncludes([
                'roomTypes',
                'user',
            ])
            ->with('city');


        // Return Response
        return response()->success(
            'this is all Hotels',
            [
                "hotels" => HotelResource::collection((clone $hotels)->simplePaginate(request()->perPage ?? $hotels->count())),
            ]
        );
    }


    public function show(Hotel $hotel)
    {
        $hotel->visit();

        $hotel->load('user', 'city', 'roomTypes');

        // Return Response
        return response()->success(
            'this is your hotel',
            [
                "hotel" => new HotelResource($hotel),
            ]
        );
    }
}
