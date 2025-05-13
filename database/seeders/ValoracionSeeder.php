<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Valoracion;
use Illuminate\Database\Seeder;

class ValoracionSeeder extends Seeder
{
    public function run()
    {
        $clientes = Cliente::all();

        if ($clientes->isEmpty()) {
            return;
        }

        $valoraciones = [
            [
                'cliente_id' => $clientes->random()->id,
                'servicio_id' => 3,
                'contenido' => 'Excelente servicio, muy profesionales y rápidos en la entrega.',
                'valoracion' => 5,
                'visible' => true,
                'fecha' => now()->subDays(1),
            ],
            [
                'cliente_id' => $clientes->random()->id,
                'servicio_id' => 3,
                'contenido' => 'La calidad es buena, pero hubo algo de demora en el servicio.',
                'valoracion' => 4,
                'visible' => true,
                'fecha' => now()->subDays(3),
            ],
            [
                'cliente_id' => $clientes->random()->id,
                'servicio_id' => 3,
                'contenido' => 'No quedamos satisfechos con el servicio, esperaba más atención.',
                'valoracion' => 2,
                'visible' => false,
                'fecha' => now()->subDays(5),
            ],
            [
                'cliente_id' => $clientes->random()->id,
                'servicio_id' => 3,
                'contenido' => 'El servicio es decente, pero necesita más opciones personalizables.',
                'valoracion' => 3,
                'visible' => true,
                'fecha' => now()->subDays(7),
            ],
            [
                'cliente_id' => $clientes->random()->id,
                'servicio_id' => 3,
                'contenido' => 'Gran atención al cliente y muy profesionales. Muy recomendable.',
                'valoracion' => 5,
                'visible' => true,
                'fecha' => now()->subDays(10),
            ],
        ];

        foreach ($valoraciones as $valoracion) {
            Valoracion::create($valoracion);
        }
    }
}
