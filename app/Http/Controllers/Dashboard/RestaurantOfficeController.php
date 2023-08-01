<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\DaysOfWeekEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PlaceContact\StorePlaceContactRequest;
use App\Http\Requests\Dashboard\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Dashboard\Restaurant\UpdateRestaurantRequest;
use App\Models\City;
use App\Models\Restaurant;
use App\Models\TableType;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RestaurantOfficeController extends Controller
{

    public function index(): View
    {
        $restaurants = Restaurant::latest()->with(['user', 'city','tableTypes'])->get();

        $daysOfWeek = DaysOfWeekEnum::getDaysForSelect();
        $users = User::all();
        $cities = City::all();
        $tableTypes = TableType::all();

        return view(
            'dashboard.pages.Restaurant.index',
            compact([
                'restaurants',
                'daysOfWeek',
                'users',
                'tableTypes',
                'cities',
            ])
        );
    }


    public function store(StoreRestaurantRequest $restaurantRequest, StorePlaceContactRequest $placeContactRequest): RedirectResponse
    {
        // Store Restaurant

        $restaurant = Restaurant::create($restaurantRequest->validated());
        $restaurant->placeContact()->create($placeContactRequest->validated());

        $restaurant->tableTypes()->sync($restaurantRequest->table_types);



        // Add Image to Restaurant
        $restaurant
            ->addMediaFromRequest('image')
            ->toMediaCollection('Restaurant');

        return back();
    }


    public function show(Restaurant $restaurant): View
    {
        return view(
            'dashboard.pages.restaurant.show',
            compact('$restaurant')
        );
    }



    public function update(UpdateRestaurantRequest $restaurantRequest, Restaurant $restaurant): RedirectResponse
    {
        // Update Restaurant
        $restaurant->update($restaurantRequest->validated());
        $restaurant->tableTypes()->sync($restaurantRequest->table_types);


        // Edit Image for  Restaurant if exist
        $restaurantRequest->hasFile('image') &&
            $restaurant
            ->addMediaFromRequest('image')
            ->toMediaCollection('Restaurant');

        return back();
    }


    public function destroy(Restaurant $restaurant): RedirectResponse
    {
        // Delete Restaurant
        $restaurant->delete();

        return back();
    }
}
