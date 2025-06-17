<?php

// Migración: create_detalles_de_salida_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detalles_de_salida', function (Blueprint $table) {       
            $table->unsignedBigInteger('notas_de_salida_id');
            $table->unsignedBigInteger('inventario_id');
            $table->foreign('notas_de_salida_id')->references('id')->on('notas_de_salida');
            $table->foreign('inventario_id')->references('id')->on('inventarios');
            $table->primary(['inventario_id','notas_de_salida_id']);
            
            //$table->string('tipo'); // producto o ingrediente
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('detalles_de_salida');
    }
};

