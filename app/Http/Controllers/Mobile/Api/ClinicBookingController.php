<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClinicBookingResource;
use App\Models\ClinicBooking;

class ClinicBookingController extends Controller
{

    public function show(ClinicBooking $clinicBooking)
    {

        $clinicBooking->load('user', 'clinicSession.clinic');
        // Return Response
        return response()->success(
            'this is your clinicBooking',
            [
                "clinicBooking" => new ClinicBookingResource($clinicBooking),
            ]
        );
    }

}
