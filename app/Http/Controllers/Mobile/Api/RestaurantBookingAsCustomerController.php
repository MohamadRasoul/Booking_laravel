<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\RestaurantBooking\DestroyRestaurantBookingRequest;
use App\Http\Requests\Mobile\RestaurantBooking\IndexRestaurantBookingForCustomerRequest;
use App\Http\Requests\Mobile\RestaurantBooking\StoreRestaurantBookingRequest;
use App\Http\Resources\RestaurantBookingResource;
use App\Models\RestaurantBooking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RestaurantBookingAsCustomerController extends Controller
{
    protected ?User $userAuth;

    public function __construct()
    {
        $this->userAuth = Auth::guard('api_user')->user() ?? null;
    }

    public function index(IndexRestaurantBookingForCustomerRequest $request)
    {
        // Get Data with filter

        $restaurantBookings = QueryBuilder::for($this->userAuth->restaurantBookings())
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


    public function destroy(DestroyRestaurantBookingRequest $request, RestaurantBooking $restaurantBooking)
    {// Delete RestaurantBooking
        $restaurantBooking->delete();

        // Return Response
        return response()->success('restaurantBooking is deleted success');
    }
}
