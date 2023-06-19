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
    "prefix" => "city"
], function () {

    Route::GET('/', [Api\CityController::class, "index"]);
    Route::GET('{city}', [Api\CityController::class, "show"]);

});


Route::group([
    "prefix" => "carOffice"
], function () {
    Route::GET('', [Api\CarOfficeController::class, "index"]);
    Route::GET('{carOffice}', [Api\CarOfficeController::class, "show"]);
});

Route::group([
    "prefix" => "carType"
], function () {
    Route::GET('', [Api\CarTypeController::class, "index"]);
});






//
//Route::group([
//    "prefix" => "city"
//], function () {
//
//    Route::GET('', [Api\CityController::class, "index"]);
//    Route::GET('{city}', [Api\CityController::class, "show"]);
//
//    Route::POST('store', [Api\CityController::class, "store"]);
//    Route::PUT('{city}', [Api\CityController::class, "update"]);
//    Route::DELETE('{city}', [Api\CityController::class, "destroy"]);
//});





