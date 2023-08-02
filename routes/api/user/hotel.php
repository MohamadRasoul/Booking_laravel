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

    Route::group([
        "prefix" => "customer"
    ], function () {
        Route::GET('', [Api\HotelBookingAsCustomerController::class, "index"]);

        Route::POST('', [Api\HotelBookingAsCustomerController::class, "store"]);

        Route::DELETE('hotelBooking/{hotelBooking}', [Api\HotelBookingAsCustomerController::class, "destroy"])->whereNumber('hotelBooking');

    });

    Route::group([
        "prefix" => "owner"
    ], function () {
        Route::GET('hotel/{hotel}/index', [Api\HotelBookingAsOwnerController::class, "indexByHotel"])->whereNumber('hotel');

        Route::POST('hotelBooking/{hotelBooking}/accept', [Api\HotelBookingAsOwnerController::class, "accept"])->whereNumber('hotelBooking');

        Route::POST('hotelBooking/{hotelBooking}/reject', [Api\HotelBookingAsOwnerController::class, "reject"])->whereNumber('hotelBooking');

    });

    Route::GET('{hotelBooking}', [Api\HotelBookingController::class, "show"])->whereNumber('hotelBooking');

});








