<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    public function run()
    {
        $servicios = [
            [
                'categoria_servicio_id' => 1,
                'nombre' => 'Sitio web y Presencia en Internet',
                'slug' => 'sitio-web',
                'descripcion_corta' => 'Tu página web básica para empezar.',
                'descripcion_larga' => 'Creamos tu sitio web profesional con toda la información esencial.',
                'icono' => 'fas fa-globe'
            ],
            [
                'categoria_servicio_id' => 1,
                'nombre' => 'Presencia Avanzada en Internet',
                'slug' => 'presencia-avanzada',
                'descripcion_corta' => 'Mayor visibilidad y alcance.',
                'descripcion_larga' => 'Posicionamiento y mejoras técnicas para destacar en buscadores.',
                'icono' => 'fas fa-rocket'
            ],
            [
                'categoria_servicio_id' => 2,
                'nombre' => 'Tienda online',
                'slug' => 'tienda-online',
                'descripcion_corta' => 'Vende en Internet.',
                'descripcion_larga' => 'Desarrollamos tu ecommerce con todo lo necesario para vender online.',
                'icono' => 'fas fa-shopping-cart'
            ],
            [
                'categoria_servicio_id' => 3,
                'nombre' => 'Gestión de Redes Sociales Básico',
                'slug' => 'redes-sociales-basico',
                'descripcion_corta' => 'Publicaciones y presencia social.',
                'descripcion_larga' => 'Creamos contenido y gestionamos tus redes sociales.',
                'icono' => 'fas fa-share-alt'
            ],
            [
                'categoria_servicio_id' => 3,

                'nombre' => 'Gestión de Redes Sociales Premium',
                'slug' => 'redes-sociales-premium',
                'descripcion_corta' => 'Mayor engagement y estrategia.',
                'descripcion_larga' => 'Gestión estratégica, campañas y diseño premium en redes.'
                , 'icono' => 'fas fa-bullhorn'
            ],
            [
                'categoria_servicio_id' => 4,

                'nombre' => 'Campaña Publicitaria de Máximo impacto + Landing page',
                'slug' => 'campana-impacto',
                'descripcion_corta' => 'Captación efectiva.',
                'descripcion_larga' => 'Campañas publicitarias con landing page optimizada.'
                , 'icono' => 'fas fa-bullseye'
            ],
            [
                'categoria_servicio_id' => 4,
                'nombre' => 'Campaña Publicitaria de Máximo rendimiento para eCommerce',
                'slug' => 'campana-ecommerce',
                'descripcion_corta' => 'Ventas al máximo.',
                'descripcion_larga' => 'Campañas centradas en ventas y conversión para tiendas online.'
                , 'icono' => 'fas fa-chart-line'
            ],
            [
                'categoria_servicio_id' => 5,
                'nombre' => 'Servicio de Diseño de Logo',
                'slug' => 'diseno-logo',
                'descripcion_corta' => 'Crea tu identidad visual.',
                'descripcion_larga' => 'Diseñamos un logotipo profesional y adaptado a tu marca.'
                , 'icono' => 'fas fa-paint-brush'
            ],
            [
                'categoria_servicio_id' => 5,
                'nombre' => 'Diseño Web que convierte visitas en clientes'
                , 'slug' => 'diseno-web-conversiones'
                , 'descripcion_corta' => 'Optimizado para convertir.'
                , 'descripcion_larga' => 'Webs centradas en mejorar la tasa de conversión.'
                , 'icono' => 'fas fa-magnet'
            ],
            [
                'categoria_servicio_id' => 6,
                'nombre' => 'Mantenimiento Web'
                , 'slug' => 'mantenimiento-web'
                , 'descripcion_corta' => 'Cuida tu web.'
                , 'descripcion_larga' => 'Mantenemos tu sitio actualizado y funcionando.'
                , 'icono' => 'fas fa-tools'
            ],
            [
                'categoria_servicio_id' => 7,
                'nombre' => 'AbogadoPRO'
                , 'slug' => 'abogadopro'
                , 'descripcion_corta' => 'Asesoría legal especializada.'
                , 'descripcion_larga' => 'Servicio jurídico orientado a negocios digitales.'
                , 'icono' => 'fas fa-gavel'
            ],
            [
                'categoria_servicio_id' => 7,
                'nombre' => 'eCommercePRO',
                'slug' => 'ecommercepro'
                , 'descripcion_corta' => 'Solución ecommerce todo en uno.'
                , 'descripcion_larga' => 'Incluye tienda online, SEO y campañas publicitarias.'
                , 'icono' => 'fas fa-store'
            ],
        ];

        foreach ($servicios as $servicio) {
            Servicio::create($servicio);
        }
    }
}
