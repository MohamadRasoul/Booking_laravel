<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Enums\BookingStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\ClinicBooking\AcceptClinicBookingRequest;
use App\Http\Requests\Mobile\ClinicBooking\IndexClinicBookingForOwnerRequest;
use App\Http\Requests\Mobile\ClinicBooking\RejectClinicBookingRequest;
use App\Http\Resources\ClinicBookingResource;
use App\Models\Clinic;
use App\Models\ClinicBooking;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\QueryBuilder;

class ClinicBookingAsOwnerController extends Controller
{
    public function indexByClinic(IndexClinicBookingForOwnerRequest $request, Clinic $clinic)
    {
        // Get Data with filter

        $clinicBookings = QueryBuilder::for($clinic->clinicBookings()->latest())
            ->allowedFilters([
                "status",
                AllowedFilter::exact('clinic_id', 'clinicSession.clinic.id'),
            ])
            ->allowedIncludes([
                'user',
                'clinicSession',
                AllowedInclude::relationship("clinicSession.clinic")
            ]);


        // Return Response
        return response()->success(
            'this is all ClinicBookings',
            [
                "clinicBookings" => ClinicBookingResource::collection((clone $clinicBookings)->simplePaginate(request()->perPage ?? $clinicBookings->count())),
            ]
        );
    }

    public function accept(AcceptClinicBookingRequest $request, ClinicBooking $clinicBooking)
    {
        $clinicBooking->update($request->validated());


        return response()->success(
            'this ClinicBookings is Accepted',
            [
                "clinicBookings" => ClinicBookingResource::make($clinicBooking),
            ]
        );
    }

    public function reject(RejectClinicBookingRequest $request, ClinicBooking $clinicBooking)
    {
        $clinicBooking->update([
            'status' => BookingStatusEnum::ADMIN_REJECTED
        ]);


        return response()->success(
            'this ClinicBookings is Rejected',
            [
                "clinicBookings" => ClinicBookingResource::make($clinicBooking),
            ]
        );
    }


}
