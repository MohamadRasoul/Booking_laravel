<?php

use App\Http\Controllers\Dashboard\{TableTypeController};
use Illuminate\Support\Facades\Route;

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


