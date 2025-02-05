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
        Schema::create('collection_card', function (Blueprint $table) {
            $table->foreignId('collection_id')->constrained('collections', 'id')->onDelete('cascade');
            $table->foreignId('card_id')->constrained('cards', 'id')->onDelete('cascade'); // Cambiado de card_id a carta_id
            $table->integer('quantity')->default(1);
            $table->timestamps();
            $table->primary(['collection_id', 'card_id']); // Cambiado de card_id a carta_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('collection_card');
    }
};
