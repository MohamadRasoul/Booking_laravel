<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\CarBooking\DestroyCarBookingRequest;
use App\Http\Requests\Mobile\CarBooking\IndexCarBookingForCustomerRequest;
use App\Http\Requests\Mobile\CarBooking\StoreCarBookingRequest;
use App\Http\Resources\CarBookingResource;
use App\Models\CarBooking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CarBookingAsCustomerController extends Controller
{
    protected ?User $userAuth;

    public function __construct()
    {
        $this->userAuth = Auth::guard('api_user')->user() ?? null;
    }

    public function index(IndexCarBookingForCustomerRequest $request)
    {
        // Get Data with filter
        $carBookings = QueryBuilder::for($this->userAuth->carBookings()->latest())
            ->allowedFilters([
                "status",
                AllowedFilter::exact('car_office_id'),
            ])
            ->allowedIncludes([
                'user',
                'carOffice',
                'carType'
            ]);


        // Return Response
        return response()->success(
            'this is all CarBookings',
            [
                "carBookings" => CarBookingResource::collection((clone $carBookings)->simplePaginate(request()->perPage ?? $carBookings->count())),
            ]
        );
    }


    public function store(StoreCarBookingRequest $request)
    {
        // Store CarBooking
        $carBooking = $this->userAuth->carBookings()->create($request->validated());

        // Return Response
        return response()->success(
            'carBooking is added success',
            [
                "carBooking" => new CarBookingResource($carBooking),
            ]
        );
    }


    public function show(CarBooking $carBooking)
    {

        $carBooking->load(
            [
                'user',
                'officeCarType' => ['carOffice']
            ]);

        // Return Response
        return response()->success(
            'this is your carBooking',
            [
                "carBooking" => new CarBookingResource($carBooking),
            ]
        );
    }


    public function destroy(DestroyCarBookingRequest $request, CarBooking $carBooking)
    {
        // Delete CarBooking
        $carBooking->delete();

        // Return Response
        return response()->success('carBooking is deleted success');
    }
}
