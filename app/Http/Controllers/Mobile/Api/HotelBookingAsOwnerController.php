<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Enums\BookingStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\HotelBooking\AcceptHotelBookingRequest;
use App\Http\Requests\Mobile\HotelBooking\IndexHotelBookingForOwnerRequest;
use App\Http\Requests\Mobile\HotelBooking\RejectHotelBookingRequest;
use App\Http\Resources\HotelBookingResource;
use App\Models\Hotel;
use App\Models\HotelBooking;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class HotelBookingAsOwnerController extends Controller
{
    public function indexByHotel(IndexHotelBookingForOwnerRequest $request, Hotel $hotel)
    {
        // Get Data with filter
        $hotelBookings = QueryBuilder::for($hotel->hotelBookings())
            ->allowedFilters([
                "status",
                AllowedFilter::exact('hotel_id'),
            ])
            ->allowedIncludes([
                'user',
                'hotel',
                'roomType'
            ]);

        // Return Response
        return response()->success(
            'this is all HotelBookings',
            [
                "hotelBookings" => HotelBookingResource::collection((clone $hotelBookings)->simplePaginate(request()->perPage ?? $hotelBookings->count())),
            ]
        );
    }

    public function accept(AcceptHotelBookingRequest $request, HotelBooking $hotelBooking)
    {
        $hotelBooking->update($request->validated());


        return response()->success(
            'this HotelBookings is Accepted',
            [
                "hotelBookings" => HotelBookingResource::make($hotelBooking),
            ]
        );
    }

    public function reject(RejectHotelBookingRequest $request, HotelBooking $hotelBooking)
    {
        $hotelBooking->update([
            'status' => BookingStatusEnum::ADMIN_REJECTED
        ]);


        return response()->success(
            'this HotelBookings is Rejected',
            [
                "hotelBookings" => HotelBookingResource::make($hotelBooking),
            ]
        );
    }


}
