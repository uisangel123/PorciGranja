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
        Schema::create('datos_nacimiento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_faseReproduccion');
            $table->foreign('id_faseReproduccion')->references('id')->on('fase_reproduccion')->onDelete('cascade');
            $table->date('Fecha_Nacimiento');
            $table->float('Peso_Promedio');
            $table->integer('Cantidad_Porcinos_Total');
            $table->integer('Cantidad_Porcinos_Criales');
            $table->integer('Cantidad_Porcinos_Reproductores');
            $table->integer('Cantidad_Porcinos_Muertos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_nacimiento');
    }
};
