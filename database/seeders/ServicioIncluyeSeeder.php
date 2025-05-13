<?php

namespace Database\Seeders;

use App\Models\Servicio;
use App\Models\ServicioIncluye;
use Illuminate\Database\Seeder;

class ServicioIncluyeSeeder extends Seeder
{
    public function run()
    {
        $servicios = Servicio::all();

        foreach ($servicios as $servicio) {
            ServicioIncluye::create([
                'servicio_id' => $servicio->id,
                'titulo' => 'Análisis personalizado',
                'contenido' => 'Revisamos tu situación concreta para darte la mejor solución.'
            ]);

           /* ServicioIncluye::create([
                'servicio_id' => $servicio->id,
                'titulo' => 'Informe final',
                'contenido' => 'Recibirás un informe detallado del trabajo realizado.'
            ]);*/
        }
    }
}
