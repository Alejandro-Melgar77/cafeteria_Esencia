<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodoDePagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
          DB::table('metodos_pago')->insert([
            ['nombre' => 'Caja', 'descripcion'=>'', 'saldo'=>0],
            ['nombre' => 'Paypal', 'descripcion'=>'admin@gmail.com', 'saldo'=>0],
            ['nombre' => 'Banco', 'descripcion'=>'1091085881', 'saldo'=>0],
        ]);
    }
}
