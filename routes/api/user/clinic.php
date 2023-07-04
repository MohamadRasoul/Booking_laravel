<?php

use App\Http\Controllers\Mobile\Api;
use Illuminate\Support\Facades\Route;


Route::group([
    "prefix" => "specialization"
], function () {
    Route::GET('', [Api\ClinicSpecializationController::class, "index"]);
});


Route::group([
], function () {
    Route::GET('', [Api\ClinicController::class, "index"]);
    Route::GET('{clinic}', [Api\ClinicController::class, "show"])->whereNumber('clinic');
});

Route::group([
    "prefix" => "session"
], function () {
    Route::GET('', [Api\ClinicSessionController::class, "index"]);
});

Route::group([
    "prefix" => "booking"
], function () {
    Route::GET('getAllForUser', [Api\ClinicBookingController::class, "indexForUser"]);
    Route::GET('{clinicBooking}', [Api\ClinicBookingController::class, "show"])->whereNumber('clinicBooking');

    Route::POST('', [Api\ClinicBookingController::class, "store"]);
    Route::DELETE('{clinicBooking}', [Api\ClinicBookingController::class, "destroy"]);

});








