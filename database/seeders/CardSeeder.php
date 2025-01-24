<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Suponiendo que tienes el JSON en un archivo 'cards.json' dentro de 'storage/app'
        $json = File::get(database_path('./pokemon.json'));
        $data = json_decode($json, true); // Convertir el JSON a un array

        foreach ($data as $expansion => $cards) {
            foreach ($cards as $card) {
                DB::table('cards')->insert([
                    'name' => $card['name'],
                    'expansion' => $card['expansion'],
                    'expansion_alt' => $card['expansion_alt'],
                    'number' => $card['number'],
                    'avg_price' => $card['avg_price'],
                    'rarity' => $card['rarity'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
