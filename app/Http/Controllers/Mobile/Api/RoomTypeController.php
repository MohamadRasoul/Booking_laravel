<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomTypeResource;
use App\Models\RoomType;
use Spatie\QueryBuilder\QueryBuilder;

class RoomTypeController extends Controller
{
    public function index()
    {
        // Get Data with filter

        $roomTypes = QueryBuilder::for(RoomType::class)
            ->allowedFilters([
                "name",
            ])->get();


        // Return Response
        return response()->success(
            'this is all RoomTypes',
            [
                "roomTypes" => RoomTypeResource::collection($roomTypes),
            ]
        );
    }

}
