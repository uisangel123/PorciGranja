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
        Schema::create('reproducciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_Porcino_Macho');
            $table->foreign('id_Porcino_Macho')->references('id')->on('reproductores');
            $table->unsignedBigInteger('id_Porcino_Hembra');
            $table->foreign('id_Porcino_Hembra')->references('id')->on('reproductores');
            $table->date('Fecha_Inicio');
            $table->date('Fecha_Final')->nullable();
            $table->string('Estado')->default('En Curso');
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
        Schema::dropIfExists('reproducciones');
    }
};
