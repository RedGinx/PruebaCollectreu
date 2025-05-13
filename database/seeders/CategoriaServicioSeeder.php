<?php

namespace Database\Seeders;

use App\Models\CategoriaServicio;
use Illuminate\Database\Seeder;

class CategoriaServicioSeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            ['nombre' => 'Presencia en Internet', 'descripcion' => 'Soluciones para tener visibilidad online.'],
            ['nombre' => 'Comercio Electrónico', 'descripcion' => 'Servicios para vender productos online.'],
            ['nombre' => 'Redes Sociales', 'descripcion' => 'Gestión y promoción en plataformas sociales.'],
            ['nombre' => 'Publicidad y Marketing', 'descripcion' => 'Campañas para atraer clientes.'],
            ['nombre' => 'Branding y Diseño', 'descripcion' => 'Diseño de identidad visual y logos.'],
            ['nombre' => 'Mantenimiento y Soporte', 'descripcion' => 'Soporte técnico y actualizaciones.'],
            ['nombre' => 'Consultoría Profesional', 'descripcion' => 'Servicios especializados para negocios.'],
        ];
        foreach ($categorias as $categoria) {
            CategoriaServicio::create($categoria);
        }
    }
}
