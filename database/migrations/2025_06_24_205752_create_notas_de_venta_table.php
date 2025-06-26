<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notas_de_venta', function (Blueprint $table) {
            $table->id();
            $table->decimal('importe', 10, 2);
            $table->date('fecha');
            $table->foreignId('metodo_pago_id')->constrained('metodos_pago');
            // Nueva clave foránea
            $table->foreignId('usuario_id')->constrained('usuarios'); // Relación con usuarios
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notas_de_venta');
    }
};
