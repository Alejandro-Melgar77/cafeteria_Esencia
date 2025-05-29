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

            ['Funcion' => 'ver bitacoras'],

        ]);
    }
}
