<?php

use App\Http\Controllers\Mobile\Api;
use Illuminate\Support\Facades\Route;


Route::group([
    "prefix" => "carOffice"
], function () {

    require __DIR__ . '/carOffice.php';

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

    Route::GET('', [Api\NotificationController::class, "index"]);

});

Route::group([
    "prefix" => "favorite"
], function () {

    Route::Post('/{model_Number}/model/{id}/modelNumber/assignFavorite', [Api\FavoriteController::class, "assignFavorite"]);
    Route::get('getRestaurantFavorites', [Api\FavoriteController::class, "getRestaurantFavorites"]);
    Route::get('getHotelFavorites', [Api\FavoriteController::class, "getHotelFavorites"]);
    Route::get('getCarOfficeFavorites', [Api\FavoriteController::class, "getCarOfficeFavorites"]);
    Route::get('getClinicFavorites', [Api\FavoriteController::class, "getClinicFavorites"]);
});








