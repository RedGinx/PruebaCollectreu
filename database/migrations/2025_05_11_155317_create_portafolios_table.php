<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portafolios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug')->unique(); // Para URLs amigables
            $table->string('imagen')->nullable(); // Ruta a la imagen de muestra
            $table->text('descripcion');
            $table->enum('tipo', ['corporativa', 'tienda', 'landing', 'blog', 'personal']);
            $table->string('demo_url')->nullable(); // Link a una demo
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('portafolios');
    }
};
