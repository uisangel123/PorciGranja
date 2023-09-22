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
        Schema::create('reproductores', function (Blueprint $table) { //Poner despues un migrate:rollback para eliminar esto, si es necesario.
            $table->unsignedBigInteger('id_repro');
            $table->primary('id_repro');
            $table->string('Raza');
            $table->string('Genero');
            $table->float('Peso');
            $table->unsignedBigInteger('Porcino_Macho');
            $table->unsignedBigInteger('Porcino_Hembra');
            $table->date('Fecha_nacimiento');
            $table->timestamps();
            $table->foreign('Porcino_Macho')->references('id_repro')->on('reproductores')->onDelete('cascade');
            $table->foreign('Porcino_Hembra')->references('id_repro')->on('reproductores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reproductores');
    }
};
