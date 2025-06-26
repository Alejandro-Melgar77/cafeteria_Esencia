<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('detalles_de_venta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nota_de_venta_id')->constrained('notas_de_venta')->onDelete('cascade');
            $table->foreignId('inventario_id')->constrained('inventarios')->onDelete('cascade');
            $table->integer('cantidad');
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalles_de_venta');
    }
};
