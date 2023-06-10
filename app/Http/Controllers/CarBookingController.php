<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarBookingResource;
use App\Models\CarBooking;
use App\Http\Requests\StoreCarBookingRequest;
use App\Http\Requests\UpdateCarBookingRequest;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CarBookingController extends Controller
{
    public function index()
    {
        // Get Data
        $carBookings = CarBooking::latest()->get();

        // OR with filter

        // $carBookings = QueryBuilder::for(CarBooking::class)
        //     ->allowedFilters([
        //         "test_id",
        //         AllowedFilter::exact('test_id'),
        //     ])->get();


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
        // Store CarBooking
        $carBooking = CarBooking::create($request->validated());


        // Add Image to CarBooking
        $carBooking
            ->addMediaFromRequest('image')
            ->toMediaCollection('CarBooking');

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
        // Return Response
        return response()->success(
            'this is your carBooking',
            [
                "carBooking" => new CarBookingResource($carBooking),
            ]
        );
    }

    public function update(UpdateCarBookingRequest $request, CarBooking $carBooking)
    {
        // Update CarBooking
         $carBooking->update($request->validated());


        // Edit Image for  CarBooking if exist
        $request->hasFile('image') &&
            $carBooking
                ->addMediaFromRequest('image')
                ->toMediaCollection('CarBooking');



        // Return Response
        return response()->success(
            'carBooking is updated success',
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
