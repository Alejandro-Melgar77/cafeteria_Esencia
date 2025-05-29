<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolPrivilegioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminId = DB::table('roles')->where('Cargo', 'administrador')->value('id');
        $personalId = DB::table('roles')->where('Cargo', 'personal')->value('id');
        $clienteId = DB::table('roles')->where('Cargo', 'cliente')->value('id');

        $privilegios = DB::table('privilegios')->get();

        foreach ($privilegios as $p) {
            DB::table('roles_privilegios')->insert([
                'RolID' => $adminId,
                'PrivilegioID' => $p->id,
            ]);
        }

        $funcionesPersonal = [
            'ver clientes',
            'crear clientes',
            'editar clientes',
            'eliminar clientes',
            'ver personal',
            'crear personal',
            'editar personal',
            'eliminar personal',
            'ver inventarios',
            'crear inventarios',
            'editar inventarios',
            'eliminar inventarios',
            'ver productos',
            'crear productos',
            'editar productos',
            'eliminar productos',
            'ver ingredientes',
            'crear ingredientes',
            'editar ingredientes',
            'eliminar ingredientes',
            'ver proveedores',
            'crear proveedores',
            'editar proveedores',
            'eliminar proveedores',
        ];

        foreach ($funcionesPersonal as $funcion) {
            $privilegioId = DB::table('privilegios')->where('Funcion', $funcion)->value('id');
            DB::table('roles_privilegios')->insert([
                'RolID' => $personalId,
                'PrivilegioID' => $privilegioId,
            ]);
        }

    }
}
