<?php

use App\Http\Controllers\Mobile\Api;
use Illuminate\Support\Facades\Route;


Route::group([
], function () {
    Route::GET('', [Api\HotelController::class, "index"]);
    Route::GET('{hotel}', [Api\HotelController::class, "show"])->whereNumber('hotel');
});

Route::group([
    "prefix" => "roomType"
], function () {
    Route::GET('', [Api\RoomTypeController::class, "index"]);
});

Route::group([
    "prefix" => "booking"
], function () {
    Route::GET('getAllForCustomer', [Api\HotelBookingController::class, "indexForCustomer"]);
    Route::GET('{hotelBooking}', [Api\HotelBookingController::class, "show"])->whereNumber('hotelBooking');

    Route::POST('', [Api\HotelBookingController::class, "store"]);
    Route::DELETE('{hotelBooking}', [Api\HotelBookingController::class, "destroy"]);

});








