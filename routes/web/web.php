<?php

use Illuminate\Support\Facades\Route;


Route::redirect('/', 'admin');


Route::group([
    "prefix" => "auth"
], function () {

    require __DIR__ . '/auth.php';

});


Route::group([
    "prefix" => "admin",
    "middleware" => "auth:web_admin"
], function () {

    require __DIR__ . '/admin/admin.php';

});

