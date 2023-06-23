<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\HotelBooking\IndexHotelBookingForUserRequest;
use App\Http\Requests\Mobile\HotelBooking\StoreHotelBookingRequest;
use App\Http\Resources\HotelBookingResource;
use App\Models\HotelBooking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\QueryBuilder;

class HotelBookingController extends Controller
{
    protected User $userAuth;

    public function __construct()
    {
        $this->userAuth = Auth::guard('api_user')->user();
    }


    public function indexForUser(IndexHotelBookingForUserRequest $request)
    {
        // Get Data with filter
        
        $hotelBookings = QueryBuilder::for($this->userAuth->hotelBookings())
            ->allowedFilters([
                "status",
                AllowedFilter::exact('hotel_id', 'hotelRoomType.hotel.id'),
            ])
            ->allowedIncludes(
                'user',
                AllowedInclude::relationship("hotelRoomType.hotel")
            )
            ->get();

        // Return Response
        return response()->success(
            'this is all HotelBookings',
            [
                "hotelBookings" => HotelBookingResource::collection($hotelBookings),
            ]
        );
    }


    public function store(StoreHotelBookingRequest $request)
    {

        // Store HotelBooking
        $hotelBooking = $this->userAuth->hotelBookings()->create($request->validated());


        // Return Response
        return response()->success(
            'hotelBooking is added success',
            [
                "hotelBooking" => new HotelBookingResource($hotelBooking),
            ]
        );
    }


    public function show(HotelBooking $hotelBooking)
    {
        // Return Response
        return response()->success(
            'this is your hotelBooking',
            [
                "hotelBooking" => new HotelBookingResource($hotelBooking),
            ]
        );
    }

    public function destroy(HotelBooking $hotelBooking)
    {
        // Delete HotelBooking
        $hotelBooking->delete();

        // Return Response
        return response()->success('hotelBooking is deleted success');
    }
}
