<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('privilegios')->insert([
            ['Funcion' => 'ver roles'],
            ['Funcion' => 'crear roles'],
            ['Funcion' => 'editar roles'],
            ['Funcion' => 'eliminar roles'],

            ['Funcion' => 'ver privilegios'],
            ['Funcion' => 'crear privilegios'],
            ['Funcion' => 'editar privilegios'],
            ['Funcion' => 'eliminar privilegios'],

            ['Funcion' => 'ver clientes'],
            ['Funcion' => 'crear clientes'],
            ['Funcion' => 'editar clientes'],
            ['Funcion' => 'eliminar clientes'],

            ['Funcion' => 'ver personal'],
            ['Funcion' => 'crear personal'],
            ['Funcion' => 'editar personal'],
            ['Funcion' => 'eliminar personal'],

            ['Funcion' => 'ver usuarios'],
            ['Funcion' => 'crear usuarios'],
            ['Funcion' => 'editar usuarios'],
            ['Funcion' => 'eliminar usuarios'],

            ['Funcion' => 'ver inventarios'],
            ['Funcion' => 'crear inventarios'],
            ['Funcion' => 'editar inventarios'],
            ['Funcion' => 'eliminar inventarios'],

            ['Funcion' => 'ver productos'],
            ['Funcion' => 'crear productos'],
            ['Funcion' => 'editar productos'],
            ['Funcion' => 'eliminar productos'],

            ['Funcion' => 'ver ingredientes'],
            ['Funcion' => 'crear ingredientes'],
            ['Funcion' => 'editar ingredientes'],
            ['Funcion' => 'eliminar ingredientes'],

            ['Funcion' => 'ver proveedores'],
            ['Funcion' => 'crear proveedores'],
            ['Funcion' => 'editar proveedores'],
            ['Funcion' => 'eliminar proveedores'],

            ['Funcion' => 'ver recetas'],
            ['Funcion' => 'crear recetas'],
            ['Funcion' => 'editar recetas'],
            ['Funcion' => 'eliminar recetas'],

            ['Funcion' => 'ver menus'],
            ['Funcion' => 'crear menus'],
            ['Funcion' => 'editar menus'],
            ['Funcion' => 'eliminar menus'],

            ['Funcion' => 'ver mesas'],
            ['Funcion' => 'crear mesas'],
            ['Funcion' => 'editar mesas'],
            ['Funcion' => 'eliminar mesas'],

            ['Funcion' => 'ver reservas'],
            ['Funcion' => 'crear reservas'],
            ['Funcion' => 'editar reservas'],
            ['Funcion' => 'eliminar reservas'],

            ['Funcion' => 'ver nota_compra'],
            ['Funcion' => 'crear nota_compra'],
            ['Funcion' => 'editar nota_compra'],
            ['Funcion' => 'eliminar nota_compra'],

            ['Funcion' => 'ver nota_salida'],
            ['Funcion' => 'crear nota_salida'],
            ['Funcion' => 'editar nota_salida'],
            ['Funcion' => 'eliminar nota_salida'],


            ['Funcion' => 'ver bitacoras'],

        ]);
    }
}
