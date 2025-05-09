<?php

use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cafeteria_esencia1', function () {
    return view('cafeteria');
});

Route::resource('roles',RolController::class);
