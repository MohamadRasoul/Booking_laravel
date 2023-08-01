<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\DaysOfWeekEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CarOffice\StoreCarOfficeRequest;
use App\Http\Requests\Dashboard\CarOffice\UpdateCarOfficeRequest;
use App\Http\Requests\Dashboard\PlaceContact\StorePlaceContactRequest;
use App\Http\Requests\Dashboard\PlaceContact\UpdatePlaceContactRequest;
use App\Models\CarOffice;
use App\Models\CarType;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CarOfficeController extends Controller
{

    public function index(): View
    {

        $carOffices = CarOffice::latest()->with(['user', 'city', 'carTypes'])->get();

        $daysOfWeek = DaysOfWeekEnum::getDaysForSelect();
        $users = User::all();
        $cities = City::all();
        $carTypes = CarType::all();


        return view(
            'dashboard.pages.carOffice.index',
            compact([
                'carOffices',
                'daysOfWeek',
                'users',
                'cities',
                'carTypes',
            ])
        );
    }


    public function store(StoreCarOfficeRequest $carOfficeRequest, StorePlaceContactRequest $placeContactRequest): RedirectResponse
    {

        $carOffice = CarOffice::create($carOfficeRequest->validated());
        $carOffice->placeContact()->create($placeContactRequest->validated());
        $carOffice->carTypes()->sync($carOfficeRequest->car_types);


        // Add Image to CarOffice
        $carOffice
            ->addMediaFromRequest('image')
            ->toMediaCollection('CarOffice');

        return back();
    }

    public function update(UpdateCarOfficeRequest $carOfficeRequest, UpdatePlaceContactRequest $placeContactRequest, CarOffice $carOffice): RedirectResponse
    {
        // Update CarOffice
        $carOffice->update($carOfficeRequest->validated());
        $carOffice->placeContact()->update($placeContactRequest->validated());
        $carOffice->carTypes()->sync($carOfficeRequest->car_types);



        // Edit Image for  CarOffice if exist
        $carOfficeRequest->hasFile('image') &&
            $carOffice
            ->addMediaFromRequest('image')
            ->toMediaCollection('CarOffice');

        return back();
    }


    public function destroy(CarOffice $carOffice): RedirectResponse
    {
        // Delete CarOffice
        $carOffice->placeContact()->delete();

        $carOffice->delete();

        return back();
    }
}
