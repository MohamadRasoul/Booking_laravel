<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreofficeCarTypeRequest;
use App\Http\Requests\UpdateofficeCarTypeRequest;
use App\Http\Resources\officeCarTypeResource;
use App\Models\officeCarType;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class OfficeCarTypeController extends Controller
{
    public function index()
    {
        // Get Data
        $officeCarTypes = officeCarType::latest()->get();

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
        $officeCarType = officeCarType::create($request->validated());


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


    public function show(officeCarType $officeCarType)
    {
        // Return Response
        return response()->success(
            'this is your officeCarType',
            [
                "officeCarType" => new officeCarTypeResource($officeCarType),
            ]
        );
    }

    public function update(UpdateofficeCarTypeRequest $request, officeCarType $officeCarType)
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

    public function destroy(officeCarType $officeCarType)
    {
        // Delete officeCarType
        $officeCarType->delete();

        // Return Response
        return response()->success('officeCarType is deleted success');
    }
}
