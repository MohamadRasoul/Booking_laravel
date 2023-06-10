<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarTypeResource;
use App\Models\CarType;
use App\Http\Requests\StoreCarTypeRequest;
use App\Http\Requests\UpdateCarTypeRequest;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CarTypeController extends Controller
{
    public function index()
    {
        // Get Data
        $carTypes = CarType::latest()->get();

        // OR with filter

        // $carTypes = QueryBuilder::for(CarType::class)
        //     ->allowedFilters([
        //         "test_id",
        //         AllowedFilter::exact('test_id'),
        //     ])->get();


        // Return Response
        return response()->success(
            'this is all CarTypes',
            [
                "carTypes" => CarTypeResource::collection($carTypes),
            ]
        );
    }


    public function store(StoreCarTypeRequest $request)
    {
        // Store CarType
        $carType = CarType::create($request->validated());


        // Add Image to CarType
        $carType
            ->addMediaFromRequest('image')
            ->toMediaCollection('CarType');

        // Return Response
        return response()->success(
            'carType is added success',
            [
                "carType" => new CarTypeResource($carType),
            ]
        );
    }


    public function show(CarType $carType)
    {
        // Return Response
        return response()->success(
            'this is your carType',
            [
                "carType" => new CarTypeResource($carType),
            ]
        );
    }

    public function update(UpdateCarTypeRequest $request, CarType $carType)
    {
        // Update CarType
         $carType->update($request->validated());


        // Edit Image for  CarType if exist
        $request->hasFile('image') &&
            $carType
                ->addMediaFromRequest('image')
                ->toMediaCollection('CarType');



        // Return Response
        return response()->success(
            'carType is updated success',
            [
                "carType" => new CarTypeResource($carType),
            ]
        );
    }

    public function destroy(CarType $carType)
    {
        // Delete CarType
        $carType->delete();

        // Return Response
        return response()->success('carType is deleted success');
    }
}
