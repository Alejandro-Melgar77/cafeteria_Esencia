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
        Schema::create('rol_privilegio', function (Blueprint $table) {
            $table->primary(['RolID', 'PrivilegioID']);
            // "RolID", "PrivilegioID"
            $table->unsignedBigInteger('RolID');
            $table->unsignedBigInteger('PrivilegioID');
            $table->foreign('RolID')->references('id')->on('Rol');
            $table->foreign('PrivilegioID')->references('id')->on('privilegio');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rol_privilegios');
    }
};
