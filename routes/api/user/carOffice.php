<?php

use App\Http\Controllers\Mobile\Api;
use Illuminate\Support\Facades\Route;


Route::group([
], function () {
    Route::GET('', [Api\CarOfficeController::class, "index"]);
    Route::GET('{carOffice}', [Api\CarOfficeController::class, "show"])->whereNumber('carOffice');
});

Route::group([
    "prefix" => "carType"
], function () {
    Route::GET('', [Api\CarTypeController::class, "index"]);
});

Route::group([
    "prefix" => "booking"
], function () {

    Route::group([
        "prefix" => "customer"
    ], function () {
        Route::GET('', [Api\CarBookingAsCustomerController::class, "index"]);

        Route::POST('', [Api\CarBookingAsCustomerController::class, "store"]);

        Route::DELETE('carBooking/{carBooking}', [Api\CarBookingAsCustomerController::class, "destroy"])->whereNumber('carBooking');

    });

    Route::group([
        "prefix" => "owner"
    ], function () {
        Route::GET('carOffice/{carOffice}/index', [Api\CarBookingAsOwnerController::class, "indexByCarOffice"]);

        Route::POST('carBooking/{carBooking}/accept', [Api\CarBookingAsOwnerController::class, "accept"])->whereNumber('carBooking');

        Route::POST('carBooking/{carBooking}/reject', [Api\CarBookingAsOwnerController::class, "reject"])->whereNumber('carBooking');

    });

    Route::GET('{carBooking}', [Api\CarBookingController::class, "show"])->whereNumber('carBooking');

});








