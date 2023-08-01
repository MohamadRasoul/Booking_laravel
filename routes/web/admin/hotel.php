<?php

use App\Http\Controllers\Dashboard\{RoomTypeController};
use App\Http\Controllers\Dashboard\HotelController;
use Illuminate\Support\Facades\Route;


Route::group([
], function () {
    Route::GET("/", [HotelController::class, 'index'])->name('index');
    // Route::GET("/{hotel}", [Hotel::class, 'show'])->name('show');

    // Route::GET("/create", [Hotel::class, 'create'])->name('create');
    Route::POST("/", [HotelController::class, 'store'])->name('store');

    // Route::GET("/{hotel}/edit", [Hotel::class, 'edit'])->name('edit');
    Route::PUT("/{hotel}", [HotelController::class, 'update'])->name('update');
    Route::DELETE("/{hotel}", [HotelController::class, 'destroy'])->name('destroy');
});







Route::group([
    'prefix' => 'roomType',
    'as' => 'roomType.'
], function () {
    Route::GET("/", [RoomTypeController::class, 'index'])->name('index');
    // Route::GET("/{roomType}", [RoomTypeController::class, 'show'])->name('show');

    // Route::GET("/create", [RoomTypeController::class, 'create'])->name('create');
    Route::POST("/", [RoomTypeController::class, 'store'])->name('store');

    // Route::GET("/{roomType}/edit", [RoomTypeController::class, 'edit'])->name('edit');
    Route::PUT("/{roomType}", [RoomTypeController::class, 'update'])->name('update');
    Route::DELETE("/{roomType}", [RoomTypeController::class, 'destroy'])->name('destroy');
});


