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
            $table->decimal('promedio_diario', 5, 2)->nullable();
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
        Schema::dropIfExists('alimentaciones');
    }
};
