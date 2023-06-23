<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\RestaurantBooking\IndexRestaurantBookingForUserRequest;
use App\Http\Requests\Mobile\RestaurantBooking\StoreRestaurantBookingRequest;
use App\Http\Resources\RestaurantBookingResource;
use App\Models\RestaurantBooking;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\QueryBuilder;

class RestaurantBookingController extends Controller
{
    public function indexForUser(IndexRestaurantBookingForUserRequest $request)
    {
        // Get Data with filter

        $user = Auth::guard('api_user')->user();


        $restaurantBookings = QueryBuilder::for($user->restaurantBookings())
            ->allowedFilters([
                "status",
                AllowedFilter::exact('restaurant_id', 'restaurantTableType.restaurant.id'),
            ])
            ->allowedIncludes(
                'user',
                AllowedInclude::relationship("restaurantTableType.restaurant")
            )
            ->get();

        // Return Response
        return response()->success(
            'this is all RestaurantBookings',
            [
                "restaurantBookings" => RestaurantBookingResource::collection($restaurantBookings),
            ]
        );
    }


    public function store(StoreRestaurantBookingRequest $request)
    {
        // Store RestaurantBooking
        $user = Auth::guard('api_user')->user();

        $restaurantBooking = $user->restaurantBookings()->create($request->validated());


        // Return Response
        return response()->success(
            'restaurantBooking is added success',
            [
                "restaurantBooking" => new RestaurantBookingResource($restaurantBooking),
            ]
        );
    }

    public function show(RestaurantBooking $restaurantBooking)
    {
        $restaurantBooking->load([
            'restaurantTableType' => ['restaurant']
        ]);


        // Return Response
        return response()->success(
            'this is your restaurantBooking',
            [
                "restaurantBooking" => new RestaurantBookingResource($restaurantBooking),
            ]
        );
    }

    public function destroy(RestaurantBooking $restaurantBooking)
    {
        // Delete RestaurantBooking
        $restaurantBooking->delete();

        // Return Response
        return response()->success('restaurantBooking is deleted success');
    }
}
