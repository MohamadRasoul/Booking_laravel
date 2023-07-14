<?php

use App\Http\Controllers\Dashboard\{CityController, NotificationController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('', function () {
    return view('dashboard.pages.dashboard');
})->name('dashboard');


Route::group([
    'prefix' => 'city',
    'as' => 'city.'
], function () {
    Route::GET("/", [CityController::class, 'index'])->name('index');
    // Route::GET("/{city}", [CityController::class, 'show'])->name('show');

    // Route::GET("/create", [CityController::class, 'create'])->name('create');
    Route::POST("/", [CityController::class, 'store'])->name('store');

    // Route::GET("/{city}/edit", [CityController::class, 'edit'])->name('edit');
    Route::PUT("/{city}", [CityController::class, 'update'])->name('update');
    Route::DELETE("/{city}", [CityController::class, 'destroy'])->name('destroy');
});


Route::group([
    'prefix' => 'notification',
    'as' => 'notification.'
], function () {
    Route::GET("/", [NotificationController::class, 'index'])->name('index');

    Route::POST("/", [NotificationController::class, 'store'])->name('store');

    Route::DELETE("/{notification}", [NotificationController::class, 'destroy'])->name('destroy');
});

