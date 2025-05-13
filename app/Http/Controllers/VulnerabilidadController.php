<?php

namespace App\Http\Controllers;

use App\Models\Vulnerabilidad;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class VulnerabilidadController extends Controller
{
    public function index()
    {
        $vulnerabilidades = Vulnerabilidad::where('visible', true)->latest()->paginate(6);
        return view('vulnerabilidades.index', compact('vulnerabilidades'));
    }

    public function show(Vulnerabilidad $vulnerabilidad)
    {
        return view('vulnerabilidades.show', compact('vulnerabilidad'));
    }
}
