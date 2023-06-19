<?php

use App\Http\Controllers\Dashboard\{CityController};
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

require __DIR__ . '/auth.php';

Route::group([
    'middleware' => ['auth'],
], function () {

    Route::get('', function () {
        return view('dashboard.index');
    });


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
});
