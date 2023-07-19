<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CarType\StoreCarTypeRequest;
use App\Http\Requests\Dashboard\CarType\UpdateCarTypeRequest;
use App\Models\CarType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarTypeController extends Controller
{

    public function index(): View
    {
        $carTypes = CarType::latest('name')->get();

        return view(
            'dashboard.pages.carType.index',
            compact('carTypes')
        );
    }


    public function store(StoreCarTypeRequest $request): RedirectResponse
    {
        // Store CarType
        $carType = CarType::create($request->validated());


        return back();

    }


    public function update(UpdateCarTypeRequest $request, CarType $carType): RedirectResponse
    {
        // Update CarType
        $carType->update($request->validated());


        return back();
    }


    public function destroy(CarType $carType): RedirectResponse
    {
        // Delete CarType
        $carType->delete();

        return back();
    }
}
