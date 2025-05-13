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
        Schema::create('vulnerabilidades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->string('imagen')->nullable();
            $table->text('extracto')->nullable();
            $table->text('descripcion');
            $table->text('solucion');
            $table->enum('severidad', ['baja', 'media', 'alta', 'critica']);
            $table->boolean('visible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vulnerabilidades');
    }
};
