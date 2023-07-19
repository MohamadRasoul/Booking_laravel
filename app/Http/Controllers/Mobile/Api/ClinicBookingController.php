<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\Clinic\IndexClinicBookingForUserRequest;
use App\Http\Requests\Mobile\Clinic\StoreClinicBookingRequest;
use App\Http\Resources\ClinicBookingResource;
use App\Models\ClinicBooking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\QueryBuilder;

class ClinicBookingController extends Controller
{
    protected $userAuth;

    public function __construct()
    {
        $this->userAuth = Auth::guard('api_user')->user();
    }

    public function indexForUser(IndexClinicBookingForUserRequest $request)
    {
        // Get Data with filter

        $clinicBookings = QueryBuilder::for(ClinicBooking::class)
            ->allowedFilters([
                "status",
                AllowedFilter::exact('clinic_id', 'clinicSession.clinic.id'),
            ])
            ->allowedIncludes([
                'user',
                'clinicSession',
                AllowedInclude::relationship("clinicSession.clinic")
            ])->get();


        // Return Response
        return response()->success(
            'this is all ClinicBookings',
            [
                "clinicBookings" => ClinicBookingResource::collection($clinicBookings),
            ]
        );
    }


    public function store(StoreClinicBookingRequest $request)
    {
        // Store ClinicBooking
        $clinicBooking = $this->userAuth->clinicBookings()->create($request->validated());


        // Return Response
        return response()->success(
            'clinicBooking is added success',
            [
                "clinicBooking" => new ClinicBookingResource($clinicBooking),
            ]
        );
    }


    public function show(ClinicBooking $clinicBooking)
    {

        $clinicBooking->load('user', 'clinicSession.clinic');
        // Return Response
        return response()->success(
            'this is your clinicBooking',
            [
                "clinicBooking" => new ClinicBookingResource($clinicBooking),
            ]
        );
    }

    public function destroy(ClinicBooking $clinicBooking)
    {
        // Delete ClinicBooking
        $clinicBooking->delete();

        // Return Response
        return response()->success('clinicBooking is deleted success');
    }
}
