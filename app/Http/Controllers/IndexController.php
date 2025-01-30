<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // Método index con paginación y filtros
    public function index(Request $request)
    {
        // Construcción de la consulta con filtros
        $query = Carta::query();

        // Filtro por nombre
        if ($request->has('name') && !empty($request->name)) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // Filtro por número de colección
        if ($request->has('number') && !empty($request->number)) {
            $query->where('number', 'like', '%' . $request->number . '%');
        }

        // Filtro por expansión
        if ($request->has('expansion') && !empty($request->expansion)) {
            $query->where('expansion', 'like', '%' . $request->expansion . '%');
        }

        // Paginación de 20 cartas por página
        $cartas = $query->paginate(20);

        // Devolver la vista con las cartas filtradas y paginadas
        return view('index', compact('cartas'));
    }
}
