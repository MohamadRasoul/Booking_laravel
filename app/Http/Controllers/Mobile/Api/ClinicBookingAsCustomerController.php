<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\ClinicBooking\DestroyClinicBookingRequest;
use App\Http\Requests\Mobile\ClinicBooking\IndexClinicBookingForCustomerRequest;
use App\Http\Requests\Mobile\ClinicBooking\StoreClinicBookingRequest;
use App\Http\Resources\ClinicBookingResource;
use App\Models\ClinicBooking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Spatie\QueryBuilder\QueryBuilder;

class ClinicBookingAsCustomerController extends Controller
{
    protected ?User $userAuth;

    public function __construct()
    {
        $this->userAuth = Auth::guard('api_user')->user() ?? null;
    }

    public function index(IndexClinicBookingForCustomerRequest $request)
    {
        // Get Data with filter

        $clinicBookings = QueryBuilder::for($this->userAuth->clinicBookings()->latest())
            ->allowedFilters([
                "status",
                AllowedFilter::exact('clinic_id', 'clinicSession.clinic.id'),
            ])
            ->allowedIncludes([
                'user',
                'clinicSession',
                AllowedInclude::relationship("clinicSession.clinic")
            ]);


        // Return Response
        return response()->success(
            'this is all ClinicBookings',
            [
                "clinicBookings" => ClinicBookingResource::collection((clone $clinicBookings)->simplePaginate(request()->perPage ?? $clinicBookings->count())),
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


    public function destroy(DestroyClinicBookingRequest $request, ClinicBooking $clinicBooking)
    {
        // Delete ClinicBooking
        $clinicBooking->delete();

        // Return Response
        return response()->success('clinicBooking is deleted success');
    }
}
