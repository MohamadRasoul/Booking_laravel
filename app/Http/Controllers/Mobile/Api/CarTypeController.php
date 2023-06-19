<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarTypeResource;
use App\Models\CarType;
use Spatie\QueryBuilder\QueryBuilder;

class CarTypeController extends Controller
{
    public function index()
    {
        // Get with filter

        $carTypes = QueryBuilder::for(CarType::class)
            ->allowedFilters([
                "name",
            ])->get();


        // Return Response
        return response()->success(
            'this is all CarTypes',
            [
                "carTypes" => CarTypeResource::collection($carTypes),
            ]
        );
    }


}
