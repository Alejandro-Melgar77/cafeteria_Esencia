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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            //"Nombre", "Email", 'Telefono', 'RolID', "id_user", "codigo"
            $table->string('Nombre');
            $table->string('Email')->unique();
            $table->string('Telefono');
            $table->unsignedBigInteger('RolID');
            $table->foreign('RolID')->references('id')->on('Rol');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
