<?php

use App\Http\Controllers\Dashboard\{CarTypeController};
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'type',
    'as' => 'type.'
], function () {
    Route::GET("/", [CarTypeController::class, 'index'])->name('index');
    // Route::GET("/{carType}", [CarTypeController::class, 'show'])->name('show');

    // Route::GET("/create", [CarTypeController::class, 'create'])->name('create');
    Route::POST("/", [CarTypeController::class, 'store'])->name('store');

    // Route::GET("/{carType}/edit", [CarTypeController::class, 'edit'])->name('edit');
    Route::PUT("/{carType}", [CarTypeController::class, 'update'])->name('update');
    Route::DELETE("/{carType}", [CarTypeController::class, 'destroy'])->name('destroy');
});


