<?php

// Migración: create_notas_de_compra_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('notas_de_compra', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->dateTime('fecha');
            $table->decimal('monto_total', 10, 2);
            $table->foreignId('proveedor_id')->constrained('proveedores')->onDelete('cascade');
            $table->foreignId('metodo_pago_id')->constrained('metodos_pago')->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('notas_de_compra');
    }
};
