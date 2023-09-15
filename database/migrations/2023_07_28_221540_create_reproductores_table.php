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
        Schema::create('reproductores', function (Blueprint $table) {//Poner despues un migrate:rollback para eliminar esto, si es necesario.
            $table->bigInteger('id')->primary();
            $table->date('Fecha_nacimiento');
            $table->string('Raza');
            $table->integer('Genero');
            $table->float('Peso');
            $table->mediumText('Procedencia');
            $table->timestamps();
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