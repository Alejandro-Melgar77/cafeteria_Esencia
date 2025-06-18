<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus_inventarios', function (Blueprint $table) {
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');
            $table->foreignId('inventario_id')->constrained('inventarios')->onDelete('cascade');
            $table->integer('cantidad')->default(1); // Nuevo campo añadido
            $table->primary(['menu_id', 'inventario_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus_inventarios');
    }
};