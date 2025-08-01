<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('Nro')->unique(); 
            $table->unsignedInteger('Capacidad');      
            $table->timestamps();                   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};