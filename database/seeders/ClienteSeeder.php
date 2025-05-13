<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        $clientes = [
            [
                'nombre_empresa' => 'Tech Solutions',
                'persona_contacto' => 'Carlos Pérez',
                'email' => 'carlos@techsolutions.com',
                'telefono' => '123456789',
                'web' => 'https://techsolutions.com',
            ],
            [
                'nombre_empresa' => 'Bierzo Marketing',
                'persona_contacto' => 'Ana López',
                'email' => 'ana@bierzo-marketing.com',
                'telefono' => '987654321',
                'web' => 'https://bierzo-marketing.com',
            ],
            [
                'nombre_empresa' => 'Creative Web Designs',
                'persona_contacto' => 'Juan González',
                'email' => 'juan@creativewebdesigns.com',
                'telefono' => '567891234',
                'web' => 'https://creativewebdesigns.com',
            ],
            [
                'nombre_empresa' => 'SecureIT Solutions',
                'persona_contacto' => 'Laura Martínez',
                'email' => 'laura@secureit.com',
                'telefono' => '135792468',
                'web' => 'https://secureit.com',
            ],
            [
                'nombre_empresa' => 'Innovative Technologies',
                'persona_contacto' => 'Luis García',
                'email' => 'luis@innovativetech.com',
                'telefono' => '246813579',
                'web' => 'https://innovativetech.com',
            ],
        ];

        foreach ($clientes as $cliente) {
            Cliente::create($cliente);
        }
    }
}
