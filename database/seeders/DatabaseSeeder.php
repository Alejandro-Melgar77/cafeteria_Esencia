<?php

namespace Database\Seeders;

use App\Models\MetodoPago;
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
        $this->call([
            RolSeeder::class,
            PrivilegioSeeder::class,
            RolPrivilegioSeeder::class,
            MetodoDePagoSeeder::class,
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
            'RolID' => 1,
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
            'RolID' => 2,
            'id_user' => $personal->id,
        ]);

        $cliente = User::create([
            'name' => 'Cliente',
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('cliente'),
        ]);

        Usuario::create([
            'Nombre' => 'Cliente',
            'Email' => 'cliente@gmail.com',
            'Telefono' => 12345678,
            'RolID' => 3,
            'id_user' => $cliente->id,
        ]);
    }
}
