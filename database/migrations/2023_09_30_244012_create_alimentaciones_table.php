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
        Schema::create('alimentaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lote');
            $table->foreign('id_lote')->references('id')->on('lotes')->onDelete('cascade');
            $table->bigInteger('promedio_semanal');
            $table->bigInteger('promedio_diario');
            $table->string('Semana');
            $table->integer('dia_1');
            $table->integer('dia_2');
            $table->integer('dia_3');
            $table->integer('dia_4');
            $table->integer('dia_5');
            $table->integer('dia_6');
            $table->integer('dia_7');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alimentaciones');
    }
};
