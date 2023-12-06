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
        Schema::create('lotes', function (Blueprint $table) {//agregar dependecia con la tabla de datosnaci
            $table->id();
            $table->string('Nombre');
            $table->unsignedBigInteger('id_corral');
            $table->foreign('id_corral')->references('id')->on('corrales')->onDelete('cascade');
            $table->integer('Cantidad_Porcinos');
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
        Schema::dropIfExists('lotes');
    }
};
