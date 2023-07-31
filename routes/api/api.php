<?php

use App\Http\Controllers\Mobile\Api\MediaController;
use Illuminate\Support\Facades\Route;


Route::group([
    "prefix" => "media"
], function () {
    Route::post('image/upload', [MediaController::class, 'uploadImage']);
});


Route::group([
    "prefix" => "auth"
], function () {

    require __DIR__ . '/auth.php';
});


Route::group([
    "prefix" => "user",
    "middleware" => "auth:api_user"
], function () {
    require __DIR__ . '/user/user.php';
});











