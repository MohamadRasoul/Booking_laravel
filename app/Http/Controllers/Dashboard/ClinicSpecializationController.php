<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ClinicSpecialization\StoreClinicSpecializationRequest;
use App\Http\Requests\Dashboard\ClinicSpecialization\UpdateClinicSpecializationRequest;
use App\Models\ClinicSpecialization;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClinicSpecializationController extends Controller
{

    public function index(): View
    {
        $clinicSpecializations = ClinicSpecialization::latest('id')->get();

        return view(
            'dashboard.pages.clinicSpecialization.index',
            compact('clinicSpecializations')
        );
    }




    public function store(StoreClinicSpecializationRequest $clinicSpecializationRequest): RedirectResponse
    {
        // Store ClinicSpecialization
        $clinicSpecialization = ClinicSpecialization::create($clinicSpecializationRequest->validated());

        return back();
    }


    public function show(ClinicSpecialization $clinicSpecialization): View
    {
        return view(
            'dashboard.pages.clinicSpecialization.show',
            compact('clinicSpecialization')
        );
    }


    public function update(UpdateClinicSpecializationRequest $clinicSpecializationRequest, ClinicSpecialization $clinicSpecialization): RedirectResponse
    {
        // Update ClinicSpecialization
        $clinicSpecialization->update($clinicSpecializationRequest->validated());

        return back();
    }


    public function destroy(ClinicSpecialization $clinicSpecialization): RedirectResponse
    {
        // Delete ClinicSpecialization
        $clinicSpecialization->delete();

        return back();
    }
}
