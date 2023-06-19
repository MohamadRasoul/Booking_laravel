<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreofficeCarTypeRequest;
use App\Http\Requests\UpdateofficeCarTypeRequest;
use App\Http\Resources\officeCarTypeResource;
use App\Models\OfficeCarType;

class OfficeCarTypeController extends Controller
{
    public function index()
    {
        // Get Data
        $officeCarTypes = OfficeCarType::latest()->get();

        // OR with filter

        // $officeCarTypes = QueryBuilder::for(officeCarType::class)
        //     ->allowedFilters([
        //         "test_id",
        //         AllowedFilter::exact('test_id'),
        //     ])->get();


        // Return Response
        return response()->success(
            'this is all officeCarTypes',
            [
                "officeCarTypes" => officeCarTypeResource::collection($officeCarTypes),
            ]
        );
    }


    public function store(StoreofficeCarTypeRequest $request)
    {
        // Store officeCarType
        $officeCarType = OfficeCarType::create($request->validated());


        // Add Image to officeCarType
        $officeCarType
            ->addMediaFromRequest('image')
            ->toMediaCollection('officeCarType');

        // Return Response
        return response()->success(
            'officeCarType is added success',
            [
                "officeCarType" => new officeCarTypeResource($officeCarType),
            ]
        );
    }


    public function show(OfficeCarType $officeCarType)
    {
        // Return Response
        return response()->success(
            'this is your officeCarType',
            [
                "officeCarType" => new officeCarTypeResource($officeCarType),
            ]
        );
    }

    public function update(UpdateofficeCarTypeRequest $request, OfficeCarType $officeCarType)
    {
        // Update officeCarType
        $officeCarType->update($request->validated());


        // Edit Image for  officeCarType if exist
        $request->hasFile('image') &&
        $officeCarType
            ->addMediaFromRequest('image')
            ->toMediaCollection('officeCarType');



        // Return Response
        return response()->success(
            'officeCarType is updated success',
            [
                "officeCarType" => new officeCarTypeResource($officeCarType),
            ]
        );
    }

    public function destroy(OfficeCarType $officeCarType)
    {
        // Delete officeCarType
        $officeCarType->delete();

        // Return Response
        return response()->success('officeCarType is deleted success');
    }
}
