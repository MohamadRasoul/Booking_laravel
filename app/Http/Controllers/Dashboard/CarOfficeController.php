<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarOfficeRequest;
use App\Http\Requests\UpdateCarOfficeRequest;
use App\Http\Resources\CarOfficeResource;
use App\Models\CarOffice;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CarOfficeController extends Controller
{
    public function index()
    {
        // Get Data
        $carOffices = CarOffice::latest()->get();

        // OR with filter

        // $carOffices = QueryBuilder::for(CarOffice::class)
        //     ->allowedFilters([
        //         "test_id",
        //         AllowedFilter::exact('test_id'),
        //     ])->get();


        // Return Response
        return response()->success(
            'this is all CarOffices',
            [
                "carOffices" => CarOfficeResource::collection($carOffices),
            ]
        );
    }


    public function store(StoreCarOfficeRequest $request)
    {
        // Store CarOffice
        $carOffice = CarOffice::create($request->validated());


        // Add Image to CarOffice
        $carOffice
            ->addMediaFromRequest('image')
            ->toMediaCollection('CarOffice');

        // Return Response
        return response()->success(
            'carOffice is added success',
            [
                "carOffice" => new CarOfficeResource($carOffice),
            ]
        );
    }


    public function show(CarOffice $carOffice)
    {
        // Return Response
        return response()->success(
            'this is your carOffice',
            [
                "carOffice" => new CarOfficeResource($carOffice),
            ]
        );
    }

    public function update(UpdateCarOfficeRequest $request, CarOffice $carOffice)
    {
        // Update CarOffice
         $carOffice->update($request->validated());


        // Edit Image for  CarOffice if exist
        $request->hasFile('image') &&
            $carOffice
                ->addMediaFromRequest('image')
                ->toMediaCollection('CarOffice');



        // Return Response
        return response()->success(
            'carOffice is updated success',
            [
                "carOffice" => new CarOfficeResource($carOffice),
            ]
        );
    }

    public function destroy(CarOffice $carOffice)
    {
        // Delete CarOffice
        $carOffice->delete();

        // Return Response
        return response()->success('carOffice is deleted success');
    }
}
