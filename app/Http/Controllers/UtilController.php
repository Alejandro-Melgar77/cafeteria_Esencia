<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UtilController extends Controller
{

    public static function getAll()
    {
        $path = app_path('Models');
        $namespace = 'App\\Models';

        if (!File::exists($path)) {
            return [];
        }

        $files = File::allFiles($path);
        $models = [];

        foreach ($files as $file) {
            $relativePath = $file->getRelativePathname();
            $class = $namespace . '\\' . str_replace(['/', '.php'], ['\\', ''], $relativePath);

            if (class_exists($class) && is_subclass_of($class, \Illuminate\Database\Eloquent\Model::class)) {
                $models[] = $class;
            }
        }

        return $models;
    }

    public static function getModelString()
    {
        $modelStrings = [
            'Bitacora' => 'bitacoras',
            'Cliente' => 'clientes',
            'Ingrediente' => 'ingredientes',
            'Inventario' => 'inventarios',
            'Personal' => 'personales',
            'Privilegio' => 'privilegios',
            'Producto' => 'productos',
            'Proveedor' => 'proveedores',
            'Rol' => 'roles',
            'User' => 'users',
            'Usuario' => 'usuarios',
            'Receta' => 'recetas',
            'Menu' => 'menus',
            'Mesas' => 'mesas',
            'Reservas' => 'reservas',
            'Nota De Compra' => 'nota_compra',
            'Nota De salida' => 'nota_salida',
            'Nota De venta' => 'nota_venta',
            'Pagos' => 'pagos',
            'Metodos de Pago' => 'metodo_pago',
            'Comprobantes' => 'comprobantes',
            'Gestionar feedbacks' => 'feedbacks',
        ];

        return collect($modelStrings)->mapWithKeys(function ($value, $key) {
            return [$key => $value];
        })->toArray();
    }
}
