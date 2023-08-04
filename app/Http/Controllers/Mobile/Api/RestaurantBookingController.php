<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantBookingResource;
use App\Models\RestaurantBooking;

class RestaurantBookingController extends Controller
{

    public function show(RestaurantBooking $restaurantBooking)
    {
        $restaurantBooking->load([
            'tableType', 'restaurant'
        ]);


        // Return Response
        return response()->success(
            'this is your restaurantBooking',
            [
                "restaurantBooking" => new RestaurantBookingResource($restaurantBooking),
            ]
        );
    }


}
