<?php

namespace App\Http\Controllers;

use App\Models\CategoriaServicio;
use Illuminate\Http\Request;

class CategoriaServicioController
{
    public function index()
    {
        $categorias = CategoriaServicio::all();
        return view('categorias.index', compact('categorias'));
    }
}
