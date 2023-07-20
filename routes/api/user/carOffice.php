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
    Route::GET('getAllForUser', [Api\CarBookingController::class, "indexForUser"]);
    Route::GET('{carBooking}', [Api\CarBookingController::class, "show"])->whereNumber('carBooking');

    Route::POST('', [Api\CarBookingController::class, "store"]);
    Route::DELETE('{carBooking}', [Api\CarBookingController::class, "destroy"])->whereNumber('carBooking');

});








