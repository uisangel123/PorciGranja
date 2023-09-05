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
        Schema::create('porcinos', function (Blueprint $table) {//Poner despues un migrate:rollback para eliminar esto, si es necesario.
            $table->id();
            $table->date('Fecha_nacimiento');
            $table->string('Raza');
            $table->integer('Genero');
            $table->float('Peso');
            $table->mediumText('Procedencia');
            $table->timestamps();
            $table->mediumText('Descripción');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('porcinos');
    }
};