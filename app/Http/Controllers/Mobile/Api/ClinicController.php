<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\Clinic\IndexClinicRequest;
use App\Http\Resources\ClinicResource;
use App\Models\Clinic;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ClinicController extends Controller
{
    
    public function index(IndexClinicRequest $request)
    {
        // Get Data with filter
        $clinics = QueryBuilder::for(Clinic::class)
            ->allowedFilters([
                "name",
                AllowedFilter::scope('is_open'),
                AllowedFilter::exact('clinic_specialization_id'),
                AllowedFilter::exact('admin_id'),
                AllowedFilter::exact('city_id'),
            ])
            ->allowedIncludes([
                'clinicSessions'
            ])
            ->with('admin', 'city', 'clinicSpecialization')
            ->get();


        // Return Response
        return response()->success(
            'this is all Clinics',
            [
                "clinics" => ClinicResource::collection($clinics),
            ]
        );
    }

    public function show(Clinic $clinic)
    {
        $clinic->load('admin', 'city', 'clinicSpecialization', 'clinicSessions');
        // Return Response
        return response()->success(
            'this is your clinic',
            [
                "clinic" => new ClinicResource($clinic),
            ]
        );
    }

}