<?php

use App\Http\Controllers\Dashboard\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => ['guest'],
], function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

});


Route::group([
    'middleware' => ['auth'],
], function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

});
