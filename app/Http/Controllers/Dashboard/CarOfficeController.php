<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CarOffice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarOfficeController extends Controller
{

    public function index(): View
    {
        $carOffices = CarOffice::latest()->get();

        return view(
            'dashboard.pages.carOffice.index',
            compact('carOffices')
        );
    }


    public function create(): View
    {
        return view(
            'dashboard.pages.carOffice.create',
        );
    }


    public function store(Request $request): RedirectResponse
    {
        // Store CarOffice
        $carOffice = CarOffice::create($request->validated());


        // Add Image to CarOffice
        $carOffice
            ->addMediaFromRequest('image')
            ->toMediaCollection('CarOffice');

        return back();

    }


    public function show(CarOffice $carOffice): View
    {
        return view(
            'dashboard.pages.carOffice.show',
            compact('carOffice')
        );
    }


    public function edit(CarOffice $carOffice): View
    {
        return view(
            'dashboard.pages.carOffice.edit',
            compact('carOffice')
        );
    }


    public function update(Request $request, CarOffice $carOffice): RedirectResponse
    {
        // Update CarOffice
        $carOffice->update($request->validated());


        // Edit Image for  CarOffice if exist
        $request->hasFile('image') &&
            $carOffice
                ->addMediaFromRequest('image')
                ->toMediaCollection('CarOffice');

        return back();
    }


    public function destroy(CarOffice $carOffice): RedirectResponse
    {
        // Delete CarOffice
        $carOffice->delete();

        return back();
    }
}
