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
        Schema::create('valoracions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')
                ->constrained('clientes')
                ->onDelete('cascade');
            $table->foreignId('servicio_id')
                ->constrained()
                ->onDelete('cascade')->nullable();
            $table->text('contenido');
            $table->tinyInteger('valoracion')->unsigned()->default(5); // 1 a 5
            $table->boolean('visible')->default(false); // solo mostrar si es aprobado
            $table->date('fecha')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valoracions');
    }
};
