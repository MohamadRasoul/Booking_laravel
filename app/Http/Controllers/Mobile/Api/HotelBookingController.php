<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HotelBookingResource;
use App\Models\HotelBooking;

class HotelBookingController extends Controller
{
    public function show(HotelBooking $hotelBooking)
    {
        $hotelBooking->load([
            'roomType',
            'hotel'
        ]);

        // Return Response
        return response()->success(
            'this is your hotelBooking',
            [
                "hotelBooking" => new HotelBookingResource($hotelBooking),
            ]
        );
    }
}
