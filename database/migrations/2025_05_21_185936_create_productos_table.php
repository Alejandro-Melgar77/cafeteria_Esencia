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
        Schema::create('productos', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->primary('id');
            $table->decimal('Precio_venta', 10, 2);
            $table->decimal('Costo_produccion', 10, 2);
            $table->integer('Porcentaje_utilidad');
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->foreign('id')->references('id')->on('inventarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
