<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservas_mesas', function (Blueprint $table) {
            $table->foreignId('reserva_id')
                  ->constrained('reservas')
                  ->onDelete('cascade');
                  
            $table->foreignId('mesa_id')
                  ->constrained('mesas')
                  ->onDelete('cascade');
                  
            $table->integer('cantidad')->default(1);
            
            $table->primary(['reserva_id', 'mesa_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas_mesas');
    }
};