<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class  extends Migration
{
    /**
     * Run the migrations.
     * @return void
     * 
     */
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->string('expansion');
            $table->string('expansion_alt');
            $table->string('number');
            $table->decimal('avg_price',8,2);
            $table->string('rarity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     * 
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
