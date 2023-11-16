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
        Schema::create('alimentacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alimentacion');
            $table->foreign('id_alimentacion')->references('id')->on('alimentaciones')->onDelete('cascade');
            $table->decimal('promedio_semanal', 5, 2)->nullable();
            $table->decimal('promedio_diario', 5, 2)->nullable();
            // $table->integer('muertos')->nullable();
            // $table->integer('consumo')->nullable();
            $table->string('Semana');
            $table->integer('dia_1')->nullable();
            $table->integer('dia_2')->nullable();
            $table->integer('dia_3')->nullable();
            $table->integer('dia_4')->nullable();
            $table->integer('dia_5')->nullable();
            $table->integer('dia_6')->nullable();
            $table->integer('dia_7')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alimentacions');
    }
};
