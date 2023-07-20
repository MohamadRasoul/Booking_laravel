<?php

use App\Http\Controllers\Dashboard\{CarTypeController,CarOfficeController};
use Illuminate\Support\Facades\Route;

Route::group([
], function () {
    Route::GET("/", [CarOfficeController::class, 'index'])->name('index');
    // Route::GET("/{carOffice}", [CarOfficeController::class, 'show'])->name('show');

    // Route::GET("/create", [CarOfficeController::class, 'create'])->name('create');
    Route::POST("/", [CarOfficeController::class, 'store'])->name('store');

    // Route::GET("/{carOffice}/edit", [CarOfficeController::class, 'edit'])->name('edit');
    Route::PUT("/{carOffice}", [CarOfficeController::class, 'update'])->name('update');
    Route::DELETE("/{carOffice}", [CarOfficeController::class, 'destroy'])->name('destroy');
});



Route::group([
    'prefix' => 'carType',
    'as' => 'carType.'
], function () {
    Route::GET("/", [CarTypeController::class, 'index'])->name('index');
    // Route::GET("/{carType}", [CarTypeController::class, 'show'])->name('show');

    // Route::GET("/create", [CarTypeController::class, 'create'])->name('create');
    Route::POST("/", [CarTypeController::class, 'store'])->name('store');

    // Route::GET("/{carType}/edit", [CarTypeController::class, 'edit'])->name('edit');
    Route::PUT("/{carType}", [CarTypeController::class, 'update'])->name('update');
    Route::DELETE("/{carType}", [CarTypeController::class, 'destroy'])->name('destroy');
});



