<?php

use App\Http\Controllers\Mobile\Api\CityController;
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
    "prefix" => "city"
], function () {

    Route::GET('/', [CityController::class, "index"]);
    Route::GET('{city}', [CityController::class, "show"]);

});

//
//Route::group([
//    "prefix" => "city"
//], function () {
//
//    Route::GET('', [CityController::class, "index"]);
//    Route::GET('{city}', [CityController::class, "show"]);
//
//    Route::POST('store', [CityController::class, "store"]);
//    Route::PUT('{city}', [CityController::class, "update"]);
//    Route::DELETE('{city}', [CityController::class, "destroy"]);
//});






