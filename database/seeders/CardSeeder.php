<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Card;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Leer JSON y validar
        $json = file_get_contents(database_path('seeders/pokemon.json'));
        $data = json_decode($json, true);

        // Crear registros
        foreach ($data as $expansion => $cards) {
            foreach ($cards as $card) {
                Card::create([
                    'key' => $card['key'],
                    'name' => $card['name'],
                    'expansion' => $card['expansion'],
                    'expansion_alt' => $card['expansion_alt'],
                    'number' => $card['number'],
                    'avg_price' => $card['avg_price'],
                    'rarity' => $card['rarity'],
                ]);
            }
        }
    }
}
