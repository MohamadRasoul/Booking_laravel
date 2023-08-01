<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\DaysOfWeekEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\DashBoard\Hotel\StoreHotelRequest;
use App\Http\Requests\DashBoard\Hotel\UpdateHotelRequest;
use App\Http\Requests\Dashboard\PlaceContact\StorePlaceContactRequest;
use App\Models\City;
use App\Models\Hotel;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HotelController extends Controller
{

    public function index(): View
    {
        $hotels = Hotel::latest()->with(['user','city','roomTypes'])->get();

        $daysOfWeek = DaysOfWeekEnum::getDaysForSelect();
        $users = User::all();
        $cities = City::all();
        $roomTypes = RoomType::all();

        return view(
            'dashboard.pages.hotel.index',
            compact([
                'hotels',
                'daysOfWeek',
                'users',
                'cities',
                'roomTypes'
                ])
        );
    }



    public function store(StoreHotelRequest $hotelRequest,StorePlaceContactRequest $placeContact): RedirectResponse
    {
        // Store Hotel
        $hotel = Hotel::create($hotelRequest->validated());
        $hotel->placeContact()->create($placeContact->validated());
        $hotel->roomTypes()->sync($hotelRequest->room_types);



        // Add Image to Hotel
        $hotel
            ->addMediaFromRequest('image')
            ->toMediaCollection('Hotel');

        return back();

    }


    public function show(Hotel $hotel): View
    {
        return view(
            'dashboard.pages.hotel.show',
            compact('hotel')
        );
    }


    public function edit(Hotel $hotel): View
    {
        return view(
            'dashboard.pages.hotel.edit',
            compact('hotel')
        );
    }


    public function update(UpdateHotelRequest $hotelRequest, Hotel $hotel): RedirectResponse
    {
        // Update Hotel
        $hotel->update($hotelRequest->validated());
        $hotel->roomTypes()->sync($hotelRequest->room_types);


        // Edit Image for  Hotel if exist
        $hotelRequest->hasFile('image') &&
            $hotel
                ->addMediaFromRequest('image')
                ->toMediaCollection('Hotel');

        return back();
    }


    public function destroy(Hotel $hotel): RedirectResponse
    {
        // Delete Hotel
        $hotel->delete();

        return back();
    }
}
