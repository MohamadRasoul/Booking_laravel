<?php

use App\Http\Controllers\Mobile\Api\AuthController;
use Illuminate\Support\Facades\Route;


Route::group([
    "prefix" => "user"
], function () {


    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::group([
        "middleware" => ["auth:api_user"]
    ], function () {

        Route::post('logout', [AuthController::class, 'logout']);

        Route::post('refresh', [AuthController::class, 'refresh']);

    });
});
