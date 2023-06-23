<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTableTypeRequest;
use App\Http\Requests\UpdateTableTypeRequest;
use App\Http\Resources\TableTypeResource;
use App\Models\TableType;
use Spatie\QueryBuilder\QueryBuilder;

class TableTypeController extends Controller
{
    public function index()
    {
        // Get Data with filter

        $tableTypes = QueryBuilder::for(TableType::class)
            ->allowedFilters([
                "name",
            ])->get();


        // Return Response
        return response()->success(
            'this is all TableTypes',
            [
                "tableTypes" => TableTypeResource::collection($tableTypes),
            ]
        );
    }


    public function store(StoreTableTypeRequest $request)
    {
        // Store TableType
        $tableType = TableType::create($request->validated());


        // Add Image to TableType
        $tableType
            ->addMediaFromRequest('image')
            ->toMediaCollection('TableType');

        // Return Response
        return response()->success(
            'tableType is added success',
            [
                "tableType" => new TableTypeResource($tableType),
            ]
        );
    }


    public function show(TableType $tableType)
    {
        // Return Response
        return response()->success(
            'this is your tableType',
            [
                "tableType" => new TableTypeResource($tableType),
            ]
        );
    }

    public function update(UpdateTableTypeRequest $request, TableType $tableType)
    {
        // Update TableType
        $tableType->update($request->validated());


        // Edit Image for  TableType if exist
        $request->hasFile('image') &&
        $tableType
            ->addMediaFromRequest('image')
            ->toMediaCollection('TableType');


        // Return Response
        return response()->success(
            'tableType is updated success',
            [
                "tableType" => new TableTypeResource($tableType),
            ]
        );
    }

    public function destroy(TableType $tableType)
    {
        // Delete TableType
        $tableType->delete();

        // Return Response
        return response()->success('tableType is deleted success');
    }
}
