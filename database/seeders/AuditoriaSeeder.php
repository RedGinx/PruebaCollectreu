<?php

namespace Database\Seeders;

use App\Models\Auditoria;
use App\Models\Cliente;
use Illuminate\Database\Seeder;

class AuditoriaSeeder extends Seeder
{
    public function run()
    {
        $clientes = Cliente::all();

        foreach ($clientes as $cliente) {
            Auditoria::create([
                'cliente_id' => $cliente->id,
                'empresa' => $cliente->nombre_empresa,
                'email' => $cliente->email,
                'url' => $cliente->web ?? 'http://default.com',
                'estado' => 'pendiente',
                'resultado' => 'Esperando auditoría...',
            ]);
        }
    }
}
