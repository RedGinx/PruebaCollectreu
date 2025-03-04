<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // Método index con paginación y filtros
    public function index(Request $request)
    {
        // Construcción de la consulta con filtros
        $query = Card::query();

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
        $cards = $query->paginate(20);

        // Devolver la vista con las cartas filtradas y paginadas
        return view('pruebaindexnavbar', compact('cards'));
    }


    public function index2(Request $request)
    {
        // Construcción de la consulta con filtros
        $query = Card::query();

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
        $cards = $query->paginate(20);

        // Devolver la vista con las cartas filtradas y paginadas
        return view('pruebaindexnavbar', compact('cards'));
    }
    public function createCollection(Request $request){
                // Construcción de la consulta con filtros
        $query = Card::query();

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
        $cards = $query->paginate(20);
            return view('create-collection', compact("cards"));
        }
}
