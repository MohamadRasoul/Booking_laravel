<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\CarBooking\IndexCarBookingForUserRequest;
use App\Http\Requests\Mobile\CarBooking\StoreCarBookingRequest;
use App\Http\Resources\CarBookingResource;
use App\Models\CarBooking;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\QueryBuilder;

class CarBookingController extends Controller
{
    public function indexForUser(IndexCarBookingForUserRequest $request)
    {
        // Get Data with filter

        $user = Auth::guard('api_user')->user();


        $carBookings = QueryBuilder::for($user->carBookings())
            ->allowedFilters([
                "status",
                AllowedFilter::exact('car_office_id', 'officeCarType.carOffice.id'),
            ])
            ->allowedIncludes(
                'user',
                AllowedInclude::relationship("officeCarType.carOffice")
            )
            ->get();


        // Return Response
        return response()->success(
            'this is all CarBookings',
            [
                "carBookings" => CarBookingResource::collection($carBookings),
            ]
        );
    }


    public function store(StoreCarBookingRequest $request)
    {
        $user = Auth::guard('api_user')->user();

        // Store CarBooking
        $carBooking = $user->carBookings()->create($request->validated());

        // Return Response
        return response()->success(
            'carBooking is added success',
            [
                "carBooking" => new CarBookingResource($carBooking),
            ]
        );
    }


    public function show(CarBooking $carBooking)
    {

        $carBooking->load(
            [
                'user',
                'officeCarType' => ['carOffice']
            ]);

        // Return Response
        return response()->success(
            'this is your carBooking',
            [
                "carBooking" => new CarBookingResource($carBooking),
            ]
        );
    }


    public function destroy(CarBooking $carBooking)
    {
        // Delete CarBooking
        $carBooking->delete();

        // Return Response
        return response()->success('carBooking is deleted success');
    }
}
