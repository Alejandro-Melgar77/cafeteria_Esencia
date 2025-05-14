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
        Rol::create([
            'Cargo' => 'Personal',
        ]);
        $rol = Rol::create([
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
            'RolID' => $rol->id,
            'id_user' => $user->id,
        ]);
    }
}
