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
        Schema::create('alimentos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Marca');
            $table->float('Precio');
            $table->float('Cantidad');
            $table->string('Descripción');
            $table->unsignedBigInteger('etapa_alimento_id');
            $table->foreign('etapa_alimento_id')->references('id')->on('etapas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alimentos');
    }
};
