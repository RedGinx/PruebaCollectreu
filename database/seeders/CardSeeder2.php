<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Card;

class CardSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Suponiendo que tienes el JSON en un archivo 'cards.json' dentro de 'storage/app'
        $json = file_get_contents(__DIR__ . '/pokemon.json');
        $data = json_decode($json, true); // Convertir el JSON a un array

        foreach ($data as $expansion => $cards) {
            foreach ($cards as $card) {
                card::create([
                    'name' => $card['name'],
                    'expansion' => $card['expansion'],
                    'expansion_alt' => $card['expansion_alt'],
                    'number' => $card['number'],
                    'avg_price' => $card['avg_price'],
                    'rarity' => $card['rarity']
                ]);
            }
        }
    }
}
