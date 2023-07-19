<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RoomType\StoreRoomTypeRequest;
use App\Http\Requests\Dashboard\RoomType\UpdateRoomTypeRequest;
use App\Models\RoomType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomTypeController extends Controller
{

    public function index(): View
    {
        $roomTypes = RoomType::latest('name')->get();

        return view(
            'dashboard.pages.roomType.index',
            compact('roomTypes')
        );
    }


    public function store(StoreRoomTypeRequest $request): RedirectResponse
    {
        // Store RoomType
        $roomType = RoomType::create($request->validated());


        return back();

    }


    public function update(UpdateRoomTypeRequest $request, RoomType $roomType): RedirectResponse
    {
        // Update RoomType
        $roomType->update($request->validated());


        return back();
    }


    public function destroy(RoomType $roomType): RedirectResponse
    {
        // Delete RoomType
        $roomType->delete();

        return back();
    }
}
