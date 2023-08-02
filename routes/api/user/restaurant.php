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
    Route::group([
        "prefix" => "customer"
    ], function () {
        Route::GET('', [Api\RestaurantBookingAsCustomerController::class, "index"]);

        Route::POST('', [Api\RestaurantBookingAsCustomerController::class, "store"]);

        Route::DELETE('restaurantBooking/{restaurantBooking}', [Api\RestaurantBookingAsCustomerController::class, "destroy"])->whereNumber('restaurantBooking');

    });

    Route::group([
        "prefix" => "owner"
    ], function () {
        Route::GET('restaurant/{restaurant}/index', [Api\RestaurantBookingAsOwnerController::class, "indexByRestaurant"])->whereNumber('restaurant');

        Route::POST('restaurantBooking/{restaurantBooking}/accept', [Api\RestaurantBookingAsOwnerController::class, "accept"])->whereNumber('restaurantBooking');

        Route::POST('restaurantBooking/{restaurantBooking}/reject', [Api\RestaurantBookingAsOwnerController::class, "reject"])->whereNumber('restaurantBooking');

    });

    Route::GET('{restaurantBooking}', [Api\RestaurantBookingController::class, "show"])->whereNumber('restaurantBooking');

});








