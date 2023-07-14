<?php

use App\Http\Controllers\Mobile\Api;
use Illuminate\Support\Facades\Route;


Route::group([
    "prefix" => "car"
], function () {

    require __DIR__ . '/car.php';

});

Route::group([
    "prefix" => "restaurant"
], function () {

    require __DIR__ . '/restaurant.php';

});

Route::group([
    "prefix" => "hotel"
], function () {

    require __DIR__ . '/hotel.php';

});


Route::group([
    "prefix" => "clinic"
], function () {

    require __DIR__ . '/clinic.php';

});


Route::group([
    "prefix" => "city"
], function () {

    Route::GET('/', [Api\CityController::class, "index"]);
    Route::GET('{city}', [Api\CityController::class, "show"]);

});

Route::group([
    "prefix" => "notification"
], function () {

    Route::GET('/', [Api\NotificationController::class, "index"]);
    Route::GET('{city}', [Api\NotificationController::class, "show"]);

});








