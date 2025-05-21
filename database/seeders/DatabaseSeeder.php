<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\User;
use App\Models\Usuario;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       Rol::create([
            'Cargo' => 'Cliente',
        ]);
        $rol_empleado = Rol::create([
            'Cargo' => 'Personal',
        ]);
        $rol_admin = Rol::create([
            'Cargo' => 'Administrador',
        ]);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        Usuario::create([
            'Nombre' => 'Admin',
            'Email' => 'admin@gmail.com',
            'Telefono' => 12345678,
            'RolID' => $rol_admin->id,
            'id_user' => $user->id,
        ]);

        $personal = User::create([
            'name' => 'Personal',
            'email' => 'personal@gmail.com',
            'password' => bcrypt('personal'),
        ]);

        Usuario::create([
            'Nombre' => 'Personal',
            'Email' => 'personal@gmail.com',
            'Telefono' => 12345678,
            'RolID' => $rol_empleado->id,
            'id_user' => $personal->id,
        ]);
    }
}
