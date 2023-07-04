<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClinicSessionResource;
use App\Models\ClinicSession;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ClinicSessionController extends Controller
{
    public function index()
    {
        // Get Data with filter
        $clinicSessions = QueryBuilder::for(ClinicSession::class)
            ->allowedFilters([
                AllowedFilter::exact('clinic_id'),
            ])->get();


        // Return Response
        return response()->success(
            'this is all ClinicSessions',
            [
                "clinicSessions" => ClinicSessionResource::collection($clinicSessions),
            ]
        );
    }

}
