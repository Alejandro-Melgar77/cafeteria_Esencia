<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion')->nullable();
            $table->unsignedTinyInteger('calificacion'); // 1-5
            $table->foreignId('nota_de_venta_id')->constrained('notas_de_venta')->onDelete('cascade');
            $table->timestamps();
            
            // Asegurar que la calificación esté entre 1-5
            //$table->check('calificacion >= 1 AND calificacion <= 5');
        });
    }

    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
};