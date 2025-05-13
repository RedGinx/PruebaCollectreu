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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_servicio_id')
                ->constrained('categoria_servicios')
                ->onDelete('cascade');
            $table->string('slug')->unique()    ;
            $table->string('nombre');
            $table->text('descripcion_corta');
            $table->text('descripcion_larga');
            $table->string('icono')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }


};
