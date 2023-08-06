<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClinicSpecializationResource;
use App\Models\ClinicSpecialization;
use Spatie\QueryBuilder\QueryBuilder;

class ClinicSpecializationController extends Controller
{
    public function index()
    {
        // Get Data with filter

        $clinicSpecializations = QueryBuilder::for(ClinicSpecialization::class)
            ->allowedFilters([
                "name",
            ]);


        // Return Response
        return response()->success(
            'this is all ClinicSpecializations',
            [
                "clinicSpecializations" => ClinicSpecializationResource::collection((clone $clinicSpecializations)->simplePaginate(request()->perPage ?? $clinicSpecializations->count())),
            ]
        );
    }


}
