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

    Route::group([
        "prefix" => "customer"
    ], function () {
        Route::GET('', [Api\ClinicBookingAsCustomerController::class, "index"]);

        Route::POST('', [Api\ClinicBookingAsCustomerController::class, "store"]);

        Route::DELETE('clinicBooking/{clinicBooking}', [Api\ClinicBookingAsCustomerController::class, "destroy"])->whereNumber('clinicBooking');

    });

    Route::group([
        "prefix" => "owner"
    ], function () {
        Route::GET('clinic/{clinic}/index', [Api\ClinicBookingAsOwnerController::class, "indexByClinic"])->whereNumber('clinic');

        Route::POST('clinicBooking/{clinicBooking}/accept', [Api\ClinicBookingAsOwnerController::class, "accept"])->whereNumber('clinicBooking');

        Route::POST('clinicBooking/{clinicBooking}/reject', [Api\ClinicBookingAsOwnerController::class, "reject"])->whereNumber('clinicBooking');

    });
    Route::GET('{clinicBooking}', [Api\ClinicBookingController::class, "show"])->whereNumber('clinicBooking');


});








