<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TableTypeResource;
use App\Models\TableType;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TableTypeController extends Controller
{
    public function index()
    {
        // Get Data with filter

        $tableTypes = QueryBuilder::for(TableType::class)
            ->allowedFilters([
                "name",
                AllowedFilter::exact('restaurant_id', 'restaurants.id')

            ]);


        // Return Response
        return response()->success(
            'this is all TableTypes',
            [
                "tableTypes" => TableTypeResource::collection((clone $tableTypes)->simplePaginate(request()->perPage ?? $tableTypes->count())),
            ]
        );
    }

}
