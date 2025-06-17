<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\NotaDeCompraController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PrivilegioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RolController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\IsPersonalMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/cafeteria', function () {
    return view('cafeteria');
})->name("cafeteria");

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Rutas solo para ADMINISTRADOR
Route::middleware(['auth', 'rol:administrador'])->group(function () {

    // Roles
    Route::get('roles', [RolController::class, 'index'])->middleware('permiso:ver roles')->name('roles.index');
    Route::get('roles/create', [RolController::class, 'create'])->middleware('permiso:crear roles')->name('roles.create');
    Route::post('roles', [RolController::class, 'store'])->middleware('permiso:crear roles')->name('roles.store');
    Route::get('roles/{id}', [RolController::class, 'show'])->middleware('permiso:ver roles')->name('roles.show');
    Route::get('roles/{id}/edit', [RolController::class, 'edit'])->middleware('permiso:editar roles')->name('roles.edit');
    Route::put('roles/{id}', [RolController::class, 'update'])->middleware('permiso:editar roles')->name('roles.update');
    Route::delete('roles/{id}', [RolController::class, 'destroy'])->middleware('permiso:eliminar roles')->name('roles.destroy');

    // Privilegios
    Route::get('privilegios', [PrivilegioController::class, 'index'])->middleware('permiso:ver privilegios')->name('privilegios.index');
    Route::get('privilegios/create', [PrivilegioController::class, 'create'])->middleware('permiso:crear privilegios')->name('privilegios.create');
    Route::post('privilegios', [PrivilegioController::class, 'store'])->middleware('permiso:crear privilegios')->name('privilegios.store');
    Route::get('privilegios/{id}', [PrivilegioController::class, 'show'])->middleware('permiso:ver privilegios')->name('privilegios.show');
    Route::get('privilegios/{id}/edit', [PrivilegioController::class, 'edit'])->middleware('permiso:editar privilegios')->name('privilegios.edit');
    Route::put('privilegios/{id}', [PrivilegioController::class, 'update'])->middleware('permiso:editar privilegios')->name('privilegios.update');
    Route::delete('privilegios/{id}', [PrivilegioController::class, 'destroy'])->middleware('permiso:eliminar privilegios')->name('privilegios.destroy');

    // Bitácora
    Route::post('bitacora', [BitacoraController::class, 'descargarRango'])->name('bitacoras.descargar.rango');
    Route::get('bitacora', [BitacoraController::class, 'descargar'])->name('bitacoras.descargar');
    Route::get('bitacoras', [BitacoraController::class, 'index'])->middleware('permiso:ver bitacoras')->name('bitacoras.index');


    //metodo de pago
    Route::get('metodos_pago', [MetodoPagoController::class, 'index'])->name('metodos_pago.index')->middleware(['auth', 'permiso:ver metodos']);
    Route::get('metodos_pago/{metodo_pago}', [MetodoPagoController::class, 'show'])->name('metodos_pago.show')->middleware(['auth', 'permiso:ver metodos']);
    Route::get('metodos_pago/create', [MetodoPagoController::class, 'create'])->name('metodos_pago.create')->middleware(['auth', 'permiso:crear metodos']);
    Route::post('metodos_pago', [MetodoPagoController::class, 'store'])->name('metodos_pago.store')->middleware(['auth', 'permiso:crear metodos']);
    Route::get('metodos_pago/{metodo_pago}/edit', [MetodoPagoController::class, 'edit'])->name('metodos_pago.edit')->middleware(['auth', 'permiso:editar metodos']);
    Route::put('metodos_pago/{metodo_pago}', [MetodoPagoController::class, 'update'])->name('metodos_pago.update')->middleware(['auth', 'permiso:editar metodos']);
    Route::delete('metodos_pago/{metodo_pago}', [MetodoPagoController::class, 'destroy'])->name('metodos_pago.destroy')->middleware(['auth', 'permiso:eliminar metodos']);
});


// Rutas para ADMINISTRADOR y PERSONAL
Route::middleware(['auth', 'rol:administrador,personal'])->group(function () {

    // Clientes
    Route::get('clientes', [ClienteController::class, 'index'])->middleware('permiso:ver clientes')->name('clientes.index');
    Route::get('clientes/create', [ClienteController::class, 'create'])->middleware('permiso:crear clientes')->name('clientes.create');
    Route::post('clientes', [ClienteController::class, 'store'])->middleware('permiso:crear clientes')->name('clientes.store');
    Route::get('clientes/{id}', [ClienteController::class, 'show'])->middleware('permiso:ver clientes')->name('clientes.show');
    Route::get('clientes/{id}/edit', [ClienteController::class, 'edit'])->middleware('permiso:editar clientes')->name('clientes.edit');
    Route::put('clientes/{id}', [ClienteController::class, 'update'])->middleware('permiso:editar clientes')->name('clientes.update');
    Route::delete('clientes/{id}', [ClienteController::class, 'destroy'])->middleware('permiso:eliminar clientes')->name('clientes.destroy');

    // Personal
    Route::get('personal', [PersonalController::class, 'index'])->middleware('permiso:ver personal')->name('personal.index');
    Route::get('personal/create', [PersonalController::class, 'create'])->middleware('permiso:crear personal')->name('personal.create');
    Route::post('personal', [PersonalController::class, 'store'])->middleware('permiso:crear personal')->name('personal.store');
    Route::get('personal/{id}', [PersonalController::class, 'show'])->middleware('permiso:ver personal')->name('personal.show');
    Route::get('personal/{id}/edit', [PersonalController::class, 'edit'])->middleware('permiso:editar personal')->name('personal.edit');
    Route::put('personal/{id}', [PersonalController::class, 'update'])->middleware('permiso:editar personal')->name('personal.update');
    Route::delete('personal/{id}', [PersonalController::class, 'destroy'])->middleware('permiso:eliminar personal')->name('personal.destroy');

    // Inventario
    Route::get('inventarios', [InventarioController::class, 'index'])->middleware('permiso:ver inventarios')->name('inventarios.index');
    Route::get('inventarios/create', [InventarioController::class, 'create'])->middleware('permiso:crear inventarios')->name('inventarios.create');
    Route::post('inventarios', [InventarioController::class, 'store'])->middleware('permiso:crear inventarios')->name('inventarios.store');
    Route::get('inventarios/{id}', [InventarioController::class, 'show'])->middleware('permiso:ver inventarios')->name('inventarios.show');
    Route::get('inventarios/{id}/edit', [InventarioController::class, 'edit'])->middleware('permiso:editar inventarios')->name('inventarios.edit');
    Route::put('inventarios/{id}', [InventarioController::class, 'update'])->middleware('permiso:editar inventarios')->name('inventarios.update');
    Route::delete('inventarios/{id}', [InventarioController::class, 'destroy'])->middleware('permiso:eliminar inventarios')->name('inventarios.destroy');

    // Ingredientes
    Route::get('ingredientes', [IngredienteController::class, 'index'])->middleware('permiso:ver ingredientes')->name('ingredientes.index');
    Route::get('ingredientes/create', [IngredienteController::class, 'create'])->middleware('permiso:crear ingredientes')->name('ingredientes.create');
    Route::post('ingredientes', [IngredienteController::class, 'store'])->middleware('permiso:crear ingredientes')->name('ingredientes.store');
    Route::get('ingredientes/{id}', [IngredienteController::class, 'show'])->middleware('permiso:ver ingredientes')->name('ingredientes.show');
    Route::get('ingredientes/{id}/edit', [IngredienteController::class, 'edit'])->middleware('permiso:editar ingredientes')->name('ingredientes.edit');
    Route::put('ingredientes/{id}', [IngredienteController::class, 'update'])->middleware('permiso:editar ingredientes')->name('ingredientes.update');
    Route::delete('ingredientes/{id}', [IngredienteController::class, 'destroy'])->middleware('permiso:eliminar ingredientes')->name('ingredientes.destroy');

    // Productos
    Route::get('productos', [ProductoController::class, 'index'])->middleware('permiso:ver productos')->name('productos.index');
    Route::get('productos/create', [ProductoController::class, 'create'])->middleware('permiso:crear productos')->name('productos.create');
    Route::post('productos', [ProductoController::class, 'store'])->middleware('permiso:crear productos')->name('productos.store');
    Route::get('productos/{id}', [ProductoController::class, 'show'])->middleware('permiso:ver productos')->name('productos.show');
    Route::get('productos/{id}/edit', [ProductoController::class, 'edit'])->middleware('permiso:editar productos')->name('productos.edit');
    Route::put('productos/{id}', [ProductoController::class, 'update'])->middleware('permiso:editar productos')->name('productos.update');
    Route::delete('productos/{id}', [ProductoController::class, 'destroy'])->middleware('permiso:eliminar productos')->name('productos.destroy');

    // Proveedores
    Route::get('proveedores', [ProveedorController::class, 'index'])->middleware('permiso:ver proveedores')->name('proveedores.index');
    Route::get('proveedores/create', [ProveedorController::class, 'create'])->middleware('permiso:crear proveedores')->name('proveedores.create');
    Route::post('proveedores', [ProveedorController::class, 'store'])->middleware('permiso:crear proveedores')->name('proveedores.store');
    Route::get('proveedores/{id}', [ProveedorController::class, 'show'])->middleware('permiso:ver proveedores')->name('proveedores.show');
    Route::get('proveedores/{id}/edit', [ProveedorController::class, 'edit'])->middleware('permiso:editar proveedores')->name('proveedores.edit');
    Route::put('proveedores/{id}', [ProveedorController::class, 'update'])->middleware('permiso:editar proveedores')->name('proveedores.update');
    Route::delete('proveedores/{id}', [ProveedorController::class, 'destroy'])->middleware('permiso:eliminar proveedores')->name('proveedores.destroy');

    // Recetas
    Route::get('recetas', [RecetaController::class, 'index'])->middleware('permiso:ver recetas')->name('recetas.index');
    Route::get('recetas/create', [RecetaController::class, 'create'])->middleware('permiso:crear recetas')->name('recetas.create');
    Route::post('recetas', [RecetaController::class, 'store'])->middleware('permiso:crear recetas')->name('recetas.store');
    Route::get('recetas/{id}', [RecetaController::class, 'show'])->middleware('permiso:ver recetas')->name('recetas.show');
    Route::get('recetas/{id}/edit', [RecetaController::class, 'edit'])->middleware('permiso:editar recetas')->name('recetas.edit');
    Route::put('recetas/{id}', [RecetaController::class, 'update'])->middleware('permiso:editar recetas')->name('recetas.update');
    Route::delete('recetas/{id}', [RecetaController::class, 'destroy'])->middleware('permiso:eliminar recetas')->name('recetas.destroy');


    //nota_compra

    Route::get('nota_compra/crear', [NotaDeCompraController::class, 'create'])->name('nota_compra.create');
    Route::post('nota_compra/guardar', [NotaDeCompraController::class, 'store'])->name('nota_compra.store');
    Route::get('nota_compra/pdf/{codigo}', [NotaDeCompraController::class, 'showPDF'])->name('nota_compra.show_pdf');
    Route::get('nota_compra/reporte', [NotaDeCompraController::class, 'reporte'])->name('nota_compra.reporte');


    // Nota de Salida
    Route::get('nota_salida/crear', [App\Http\Controllers\NotaDeSalidaController::class, 'create'])
        ->middleware('permiso:crear nota_salida')
        ->name('nota_salida.create');

    Route::post('nota_salida/guardar', [App\Http\Controllers\NotaDeSalidaController::class, 'store'])
        ->middleware('permiso:crear nota_salida')
        ->name('nota_salida.store');

    Route::get('nota_salida/pdf/{codigo}', [App\Http\Controllers\NotaDeSalidaController::class, 'showPDF'])
        ->middleware('permiso:ver nota_salida')
        ->name('nota_salida.show_pdf');

    Route::get('nota_salida/reporte', [App\Http\Controllers\NotaDeSalidaController::class, 'reporte'])
        ->middleware('permiso:ver nota_salida')
        ->name('nota_salida.reporte');
});

// Rutas para ADMINISTRADOR, PERSONAL y CLIENTES
Route::middleware(['auth', 'rol:administrador,personal,clientes'])->group(function () {

    // Usuarios (también con ClienteController, puedes separarlo luego)
    Route::get('usuarios', [ClienteController::class, 'index'])->middleware('permiso:ver usuarios')->name('usuarios.index');
    Route::get('usuarios/create', [ClienteController::class, 'create'])->middleware('permiso:crear usuarios')->name('usuarios.create');
    Route::post('usuarios', [ClienteController::class, 'store'])->middleware('permiso:crear usuarios')->name('usuarios.store');
    Route::get('usuarios/{id}', [ClienteController::class, 'show'])->middleware('permiso:ver usuarios')->name('usuarios.show');
    Route::get('usuarios/{id}/edit', [ClienteController::class, 'edit'])->middleware('permiso:editar usuarios')->name('usuarios.edit');
    Route::put('usuarios/{id}', [ClienteController::class, 'update'])->middleware('permiso:editar usuarios')->name('usuarios.update');
    Route::delete('usuarios/{id}', [ClienteController::class, 'destroy'])->middleware('permiso:eliminar usuarios')->name('usuarios.destroy');
});


// Rutas para invitados y clientes (autenticación)
Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, "formLogin"])->name("login");
    Route::post('login', [AuthController::class, "login"])->name("login.post");

    Route::get('register', [AuthController::class, 'formRegister'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.post');
});


// Logout (protegido por sesión activa)
Route::post('logout', [AuthController::class, "logout"])->middleware('auth')->name("logout");
