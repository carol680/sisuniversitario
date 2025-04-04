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
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->text('direccion');
            $table->string('telefono', 20);  // Especifica el tamaño si es necesario
            $table->string('email', 255);    // Tamaño recomendado para emails
            $table->string('web')->nullable();
            $table->string('logo');         // Si estás guardando solo la ruta o el nombre del archivo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuraciones');
    }
};
