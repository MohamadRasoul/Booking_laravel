<?php

use App\Http\Controllers\Dashboard\{RestaurantOfficeController, TableTypeController};
use Illuminate\Support\Facades\Route;





Route::group([
], function () {
    Route::GET("/", [RestaurantOfficeController::class, 'index'])->name('index');
    // Route::GET("/{carOffice}", [RestaurantOffice::class, 'show'])->name('show');

    // Route::GET("/create", [RestaurantOffice::class, 'create'])->name('create');
    Route::POST("/", [RestaurantOfficeController::class, 'store'])->name('store');

    // Route::GET("/{carOffice}/edit", [RestaurantOffice::class, 'edit'])->name('edit');
    Route::PUT("/{restaurant}", [RestaurantOfficeController::class, 'update'])->name('update');
    Route::DELETE("/{restaurant}", [RestaurantOfficeController::class, 'destroy'])->name('destroy');
});


Route::group([
    'prefix' => 'tableType',
    'as' => 'tableType.'
], function () {
    Route::GET("/", [TableTypeController::class, 'index'])->name('index');
    // Route::GET("/{tableType}", [TableTypeController::class, 'show'])->name('show');

    // Route::GET("/create", [TableTypeController::class, 'create'])->name('create');
    Route::POST("/", [TableTypeController::class, 'store'])->name('store');

    // Route::GET("/{tableType}/edit", [TableTypeController::class, 'edit'])->name('edit');
    Route::PUT("/{tableType}", [TableTypeController::class, 'update'])->name('update');
    Route::DELETE("/{tableType}", [TableTypeController::class, 'destroy'])->name('destroy');
});


