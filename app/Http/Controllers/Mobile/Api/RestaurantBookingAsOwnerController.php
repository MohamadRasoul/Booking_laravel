<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Enums\BookingStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\RestaurantBooking\AcceptRestaurantBookingRequest;
use App\Http\Requests\Mobile\RestaurantBooking\IndexRestaurantBookingForOwnerRequest;
use App\Http\Requests\Mobile\RestaurantBooking\RejectRestaurantBookingRequest;
use App\Http\Resources\RestaurantBookingResource;
use App\Models\Restaurant;
use App\Models\RestaurantBooking;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RestaurantBookingAsOwnerController extends Controller
{

    public function indexByRestaurant(IndexRestaurantBookingForOwnerRequest $request, Restaurant $restaurant)
    {
        // Get Data with filter

        $restaurantBookings = QueryBuilder::for($restaurant->restaurantBookings())
            ->allowedFilters([
                "status",
                AllowedFilter::exact('restaurant_id',),
            ])
            ->allowedIncludes([
                'user',
                'restaurant',
                'tableType'
            ]);

        // Return Response
        return response()->success(
            'this is all RestaurantBookings',
            [
                "restaurantBookings" => RestaurantBookingResource::collection((clone $restaurantBookings)->simplePaginate(request()->perPage ?? $restaurantBookings->count())),
            ]
        );
    }


    public function accept(AcceptRestaurantBookingRequest $request, RestaurantBooking $restaurantBooking)
    {
        $restaurantBooking->update($request->validated());


        return response()->success(
            'this RestaurantBookings is Accepted',
            [
                "restaurantBookings" => RestaurantBookingResource::make($restaurantBooking),
            ]
        );
    }

    public function reject(RejectRestaurantBookingRequest $request, RestaurantBooking $restaurantBooking)
    {
        $restaurantBooking->update([
            'status' => BookingStatusEnum::ADMIN_REJECTED
        ]);


        return response()->success(
            'this RestaurantBookings is Rejected',
            [
                "restaurantBookings" => RestaurantBookingResource::make($restaurantBooking),
            ]
        );
    }

}
