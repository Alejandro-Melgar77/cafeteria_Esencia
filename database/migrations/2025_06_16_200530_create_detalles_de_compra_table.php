<?php

// Migración: create_detalles_de_compra_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detalles_de_compra', function (Blueprint $table) {
           // $table->id();
             $table->unsignedBigInteger('nota_de_compra_id');
             $table->unsignedBigInteger('inventario_id');
            $table->foreign('nota_de_compra_id')->references('id')->on('notas_de_compra');
            $table->foreign('inventario_id')->references('id')->on('inventarios');
            $table->primary(['inventario_id','nota_de_compra_id']);
            //$table->string('tipo'); // producto o ingrediente
        
            $table->decimal('cantidad', 8, 2);
            $table->decimal('precio_unitario', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('detalles_de_compra');
    }
};
