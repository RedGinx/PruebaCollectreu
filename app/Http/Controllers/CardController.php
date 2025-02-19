<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
