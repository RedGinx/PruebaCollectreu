<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cartas2', function (Blueprint $table) {
            $table->primary(['name', 'expansion_alt', 'number']);    // Identificador de la carta
            $table->string('name');             // Nombre de la carta
            $table->string('expansion');        // Expansión
            $table->string('expansion_alt');    // Nombre alternativo de la expansión
            $table->string('number');           // Número de la carta
            $table->decimal('avg_price', 8, 2); // Precio promedio
            $table->string('rarity');           // Rareza
            $table->timestamps();               // Fechas de creación y actualización
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartas2');
    }
};
