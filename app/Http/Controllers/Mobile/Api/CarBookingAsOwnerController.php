<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Enums\BookingStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\CarBooking\AcceptCarBookingRequest;
use App\Http\Requests\Mobile\CarBooking\IndexCarBookingForOwnerRequest;
use App\Http\Requests\Mobile\CarBooking\RejectCarBookingRequest;
use App\Http\Resources\CarBookingResource;
use App\Models\CarBooking;
use App\Models\CarOffice;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CarBookingAsOwnerController extends Controller
{

    public function indexByCarOffice(IndexCarBookingForOwnerRequest $request, CarOffice $carOffice)
    {
        // Get Data with filter
        $carBookings = QueryBuilder::for($carOffice->carBookings())
            ->allowedFilters([
                "status",
                AllowedFilter::exact('car_office_id'),
            ])
            ->allowedIncludes([
                'user',
                'carOffice',
                'carType'
            ]);


        // Return Response
        return response()->success(
            'this is all CarBookings',
            [
                "carBookings" => CarBookingResource::collection((clone $carBookings)->simplePaginate(request()->perPage ?? $carBookings->count())),
            ]
        );
    }


    public function accept(AcceptCarBookingRequest $request, CarBooking $carBooking)
    {
        $carBooking->update($request->validated());


        return response()->success(
            'this CarBookings is Accepted',
            [
                "carBookings" => CarBookingResource::make($carBooking),
            ]
        );
    }

    public function reject(RejectCarBookingRequest $request, CarBooking $carBooking)
    {
        $carBooking->update([
            'status' => BookingStatusEnum::ADMIN_REJECTED
        ]);


        return response()->success(
            'this CarBookings is Rejected',
            [
                "carBookings" => CarBookingResource::make($carBooking),
            ]
        );
    }
}
