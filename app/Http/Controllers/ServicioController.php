<?php

namespace App\Http\Controllers;

use App\Models\CategoriaServicio;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController
{
    // ServicioController.php
    public function index(Request $request)
    {
        $categorias = CategoriaServicio::all();
        $query = Servicio::with('categoria');

        if ($request->filled('categoria')) {
            $query->where('categoria_servicio_id', $request->categoria);
        }

        $servicios = $query->get();

        return view('servicios.index', compact('servicios', 'categorias'));
    }
}
