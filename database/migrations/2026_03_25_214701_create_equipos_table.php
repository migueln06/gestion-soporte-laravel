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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente');
            $table->string('tipo_equipo'); // Ejemplo: Laptop, Desktop
            $table->string('marca');
            $table->text('falla');
            $table->string('estado')->default('Pendiente'); // Pendiente, en proceso, listo.
            $table->timestamps(); // Crea el created_at y updated_at automaticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
