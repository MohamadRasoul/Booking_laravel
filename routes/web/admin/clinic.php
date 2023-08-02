<?php

use App\Http\Controllers\Dashboard\{ClinicController, ClinicSpecializationController};
use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::GET("/", [ClinicController::class, 'index'])->name('index');
    // Route::GET("/{clinic}", [ClinicController::class, 'show'])->name('show');

    // Route::GET("/create", [ClinicController::class, 'create'])->name('create');
    Route::POST("/", [ClinicController::class, 'store'])->name('store');

    // Route::GET("/{clinic}/edit", [ClinicController::class, 'edit'])->name('edit');
    Route::PUT("/{clinic}", [ClinicController::class, 'update'])->name('update');
    Route::DELETE("/{clinic}", [ClinicController::class, 'destroy'])->name('destroy');
});



Route::group([
    'prefix' => 'clinicSpecialization',
    'as' => 'clinicSpecialization.'
], function () {
    Route::GET("/", [ClinicSpecializationController::class, 'index'])->name('index');
    // Route::GET("/{carType}", [CarTypeController::class, 'show'])->name('show');

    // Route::GET("/create", [CarTypeController::class, 'create'])->name('create');
    Route::POST("/", [ClinicSpecializationController::class, 'store'])->name('store');

    // Route::GET("/{carType}/edit", [CarTypeController::class, 'edit'])->name('edit');
    Route::PUT("/{clinicSpecialization}", [ClinicSpecializationController::class, 'update'])->name('update');
    Route::DELETE("/{clinicSpecialization}", [ClinicSpecializationController::class, 'destroy'])->name('destroy');
});
