<?php

use App\Http\Controllers\Mobile\Api;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    "prefix" => "auth"
], function () {

    require __DIR__ . '/auth.php';

});


Route::group([
    "middleware" => "auth:api_user"
], function () {


    Route::group([
        "prefix" => "city"
    ], function () {

        Route::GET('/', [Api\CityController::class, "index"]);
        Route::GET('{city}', [Api\CityController::class, "show"]);

    });


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

});







