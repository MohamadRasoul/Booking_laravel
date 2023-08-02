<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\CreateSessionForClinic;
use App\Enums\DaysOfWeekEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Clinic\StoreClinicRequest;
use App\Http\Requests\Dashboard\Clinic\UpdateClinicRequest;
use App\Http\Requests\Dashboard\PlaceContact\StorePlaceContactRequest;
use App\Models\City;
use App\Models\Clinic;
use App\Models\ClinicSpecialization;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClinicController extends Controller
{

    public function index(): View
    {

        $clinics = Clinic::latest()->with(
            [
                'user', 'city', 'clinicSpecialization', 'clinicSessions',
            ]
        )->get();
        $daysOfWeek = DaysOfWeekEnum::getDaysForSelect();
        $users = User::all();
        $cities = City::all();
        $clinicSpecializations = ClinicSpecialization::all();

        return view(
            'dashboard.pages.clinic.index',
            compact([
                'daysOfWeek',
                'users',
                'cities',
                'clinicSpecializations',
                'clinics'
            ])
        );
    }

    public function store(StoreClinicRequest $clinicRequest, StorePlaceContactRequest $placeContactRequest): RedirectResponse
    {
        // Store Clinic
        $clinic = Clinic::create($clinicRequest->validated());
        $clinic->placeContact()->create($placeContactRequest->validated());

        (new  CreateSessionForClinic)->handle($clinic);

        // Add Image to Clinic
        $clinic
            ->addMediaFromRequest('image')
            ->toMediaCollection('Clinic');

        return back();
    }


    public function show(Clinic $clinic): View
    {
        return view(
            'dashboard.pages.clinic.show',
            compact('clinic')
        );
    }



    public function update(UpdateClinicRequest $clinicRequest, Clinic $clinic): RedirectResponse
    {
        // Update Clinic
        $clinic->update($clinicRequest->validated());
        if ($clinicRequest['session_duration'] != $clinic->session_duration) {
            $clinic->clinicSessions()->delete();
            (new  CreateSessionForClinic)->handle($clinic);
        }

        // Edit Image for  Clinic if exist
        $clinicRequest->hasFile('image') &&
            $clinic
            ->addMediaFromRequest('image')
            ->toMediaCollection('Clinic');

        return back();
    }


    public function destroy(Clinic $clinic): RedirectResponse
    {
        // Delete Clinic
        $clinic->delete();

        return back();
    }
}
