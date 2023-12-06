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
        Schema::create('nacimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_faseReproduccion');
            $table->foreign('id_faseReproduccion')->references('id')->on('reproducciones')->onDelete('cascade');
            $table->date('Fecha_Nacimiento');
            $table->float('Peso_Promedio');
            $table->integer('Cantidad_Porcinos_Total');
            $table->integer('Cantidad_Porcinos_Criales');
            $table->integer('Cantidad_Porcinos_Reproductores');
            $table->integer('Cantidad_Porcinos_Muertos');
            $table->integer('Cantidad_Porcinos_Vivos');
            $table->unsignedBigInteger('id_lote')->nullable();//crear un select en el form de nacimientos para seleccionar el lote en el q ira los cerdos nacidosxd
            $table->foreign('id_lote')->references('id')->on('lotes')->onDelete('cascade');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nacimientos');
    }
};
