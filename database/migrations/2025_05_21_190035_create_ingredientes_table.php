<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->primary('id');

            //protected $fillable = ['Unidad_Medida','Costo_Unitario','Costo_Promedio'];
            $table->string('Unidad_Medida');
            $table->decimal('Costo_Unitario',10,2);
            $table->decimal('Costo_Promedio',10,2);
            $table->timestamps();
            $table->foreign('id')->references('id')->on('inventarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredientes');
    }
};
