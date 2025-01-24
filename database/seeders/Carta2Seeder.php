<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\carta;
use App\Models\carta2;
use Illuminate\Support\Facades\File;

class Carta2Seeder extends Seeder
{
    public function run()
    {
        // Leer el archivo JSON completo
        $json = file_get_contents(__DIR__ . '/pokemon.json');
        $cartas = json_decode($json, true);

        // Iterar por cada lista y carta para insertarlas en la base de datos
        foreach ($cartas as $expansion => $listaCartas) {
            foreach ($listaCartas as $carta) {
                carta2::create([
                    'name' => $carta['name'],
                    'expansion' => $carta['expansion'],
                    'expansion_alt' => $carta['expansion_alt'],
                    'number' => $carta['number'],
                    'avg_price' => $carta['avg_price'],
                    'rarity' => $carta['rarity'],
                ]);
            }
        }
    }
}
