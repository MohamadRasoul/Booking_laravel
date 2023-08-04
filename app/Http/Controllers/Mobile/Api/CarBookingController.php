<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarBookingResource;
use App\Models\CarBooking;

class CarBookingController extends Controller
{

    public function show(CarBooking $carBooking)
    {

        $carBooking->load(
            [
                'user',
                'carOffice',
                'carType'
            ]);

        // Return Response
        return response()->success(
            'this is your carBooking',
            [
                "carBooking" => new CarBookingResource($carBooking),
            ]
        );
    }


}
