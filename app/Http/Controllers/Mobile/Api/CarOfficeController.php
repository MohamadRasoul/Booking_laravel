<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarOfficeResource;
use App\Models\CarOffice;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CarOfficeController extends Controller
{
    public function index()
    {
        // Get Data with filter
        $carOffices = QueryBuilder::for(CarOffice::class)
            ->allowedFilters([
                "name",
                AllowedFilter::exact('city_id'),
                AllowedFilter::exact('user_id'),
            ])
            ->allowedIncludes([
                'carTypes',
                'user',
            ])
            ->with('city');

        // Return Response
        return response()->success(
            'this is all CarOffices',
            [
                "carOffices" => CarOfficeResource::collection((clone $carOffices)->simplePaginate(request()->perPage ?? $carOffices->count())),
            ]
        );
    }


    public function show(CarOffice $carOffice)
    {
        $carOffice->visit();
        $carOffice->load('user', 'city', 'carTypes');
        // Return Response
        return response()->success(
            'this is your carOffice',
            [
                "carOffice" => new CarOfficeResource($carOffice),
            ]
        );
    }
}
