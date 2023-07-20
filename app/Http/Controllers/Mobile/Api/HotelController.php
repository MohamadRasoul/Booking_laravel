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
                'roomTypes'
            ])
            ->with('user', 'city')
            ->get();


        // Return Response
        return response()->success(
            'this is all Hotels',
            [
                "hotels" => HotelResource::collection($hotels),
            ]
        );
    }


    public function show(Hotel $hotel)
    {

        $hotel->load('admin', 'city', 'roomTypes');

        // Return Response
        return response()->success(
            'this is your hotel',
            [
                "hotel" => new HotelResource($hotel),
            ]
        );
    }
}
