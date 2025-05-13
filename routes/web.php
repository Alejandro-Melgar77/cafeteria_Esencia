<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PrivilegioController;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cafeteria_esencia1', function () {
    return view('cafeteria');
})->name("cafeteria");

Route::resource('roles',RolController::class);
Route::resource('privilegios',PrivilegioController::class);
Route::resource('clientes',ClienteController::class);

Route::get('login', [AuthController::class, "formLogin"])->name("login");
Route::post('login', [AuthController::class, "login"])->name("login.post");

Route::get('register', [AuthController::class, 'formRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');

Route::get('bitacorapdf/{inicio}/{final}', [BitacoraController::class,'descargarBitacoraPdf'])->name('descargarBitacoraPdf');