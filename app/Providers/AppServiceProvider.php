<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cliente;
use App\Models\Ingrediente;
use App\Models\Inventario;
use App\Models\Personal;
use App\Models\Privilegio;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Receta;
use App\Models\Rol;
use App\Models\User;
use App\Models\Usuario;
use App\Observers\BitacoraObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $modelos = [
            Rol::class,
            User::class,
            Usuario::class,
            Cliente::class,
                // Ingrediente::class,
            Inventario::class,
            Personal::class,
            Privilegio::class,
                // Producto::class,
            Proveedor::class,
            Receta::class,
        ];
        foreach ($modelos as $modelo) {
            $modelo::observe(BitacoraObserver::class);
        }
    }
}
