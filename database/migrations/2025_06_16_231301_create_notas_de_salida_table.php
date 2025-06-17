<?php

// Migración: create_notas_de_salida_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('notas_de_salida', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->dateTime('fecha');
            $table->string('descripcion');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('notas_de_salida');
    }
};
