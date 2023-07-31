<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\Restaurant\IndexRestaurantBookingForCustomerRequest;
use App\Http\Requests\Mobile\Restaurant\StoreRestaurantBookingRequest;
use App\Http\Resources\RestaurantBookingResource;
use App\Models\RestaurantBooking;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\QueryBuilder;

class RestaurantBookingController extends Controller
{
    protected $userAuth;

    public function __construct()
    {
        $this->userAuth = Auth::guard('api_user')->user();
    }

    public function indexForCustomer(IndexRestaurantBookingForCustomerRequest $request)
    {
        // Get Data with filter

        $restaurantBookings = QueryBuilder::for($this->userAuth->restaurantBookings())
            ->allowedFilters([
                "status",
                AllowedFilter::exact('restaurant_id', 'restaurantTableType.restaurant.id'),
            ])
            ->allowedIncludes(
                'user',
                AllowedInclude::relationship("restaurantTableType.restaurant")
            )
            ->with([
                'restaurant',
                'tableType'
            ])
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

        $restaurantBooking = $this->userAuth->restaurantBookings()->create($request->validated());


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
