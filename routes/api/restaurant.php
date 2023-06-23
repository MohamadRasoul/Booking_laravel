<?php

use App\Http\Controllers\Mobile\Api;
use Illuminate\Support\Facades\Route;


Route::group([
], function () {
    Route::GET('', [Api\RestaurantController::class, "index"]);
    Route::GET('{restaurant}', [Api\RestaurantController::class, "show"])->whereNumber('restaurant');
});

Route::group([
    "prefix" => "tableType"
], function () {
    Route::GET('', [Api\TableTypeController::class, "index"]);
});

Route::group([
    "prefix" => "booking"
], function () {
    Route::GET('getAllForUser', [Api\RestaurantBookingController::class, "indexForUser"]);
    Route::GET('{restaurantBooking}', [Api\RestaurantBookingController::class, "show"])->whereNumber('restaurantBooking');

    Route::POST('', [Api\RestaurantBookingController::class, "store"]);
    Route::DELETE('{restaurantBooking}', [Api\RestaurantBookingController::class, "destroy"]);

});








