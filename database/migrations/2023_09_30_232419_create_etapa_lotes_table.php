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
        Schema::create('etapa_lotes', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->unsignedBigInteger('id_lote');
            $table->foreign('id_lote')->references('id')->on('lotes')->onDelete('cascade');
            $table->unsignedBigInteger('id_etapa');
            $table->foreign('id_etapa')->references('id')->on('etapas')->onDelete('cascade');
            $table->date('Fecha_inicial');
            $table->date('Fecha_final')->nullable();
            $table->float('Peso_inicial');
            $table->float('Peso_final')->nullable();
            $table->integer('Cantidad_inicial');
            $table->integer('Cantidad_final')->nullable();
            $table->integer('Muertes_totales')->nullable();
            $table->float('Porcentaje_Mortalidad')->nullable();
            $table->unsignedBigInteger('id_alimento');
            $table->foreign('id_alimento')->references('id')->on('alimentos')->onDelete('cascade');
            $table->mediumText('Observaciones');
            $table->unsignedBigInteger('id_alimentacion')->nullable();
            $table->foreign('id_alimentacion')->references('id')->on('alimentaciones')->onDelete('cascade');
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
        Schema::dropIfExists('etapa_lotes');
    }
};