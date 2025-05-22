<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PrivilegioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RolController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\IsPersonalMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/cafeteria', function () {
    return view('cafeteria');
})->name("cafeteria");


// Rutas exclusivas para Administrador
Route::middleware(['auth', 'rol:administrador'])->group(function () {
    Route::resource('roles', RolController::class);
    Route::resource('privilegios', PrivilegioController::class);
    Route::get('bitacorapdf/{inicio}/{final}', [BitacoraController::class, 'descargarBitacoraPdf'])
        ->name('descargarBitacoraPdf');
    Route::get('bitacorapdfall', [BitacoraController::class, 'descargarBitacoraPdfAll'])
        ->name('descargarBitacoraPdfall');
});

// Rutas para Administrador o Personal
Route::middleware(['auth', 'rol:administrador,personal'])->group(function () {
    Route::resource('clientes', ClienteController::class);
    Route::resource('personal', ClienteController::class);
    Route::resource('usuarios', ClienteController::class);
    Route::resource('inventarios', InventarioController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('ingredientes', IngredienteController::class);
});

// Rutas para Clientes e invitados
Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, "formLogin"])->name("login");
    Route::post('login', [AuthController::class, "login"])->name("login.post");
    Route::get('register', [AuthController::class, 'formRegister'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('logout', [AuthController::class, "logout"])->name("logout");

