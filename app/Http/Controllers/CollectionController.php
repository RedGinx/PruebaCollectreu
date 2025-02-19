<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Card;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CollectionController extends Controller
{
    public function create()
    {
        $query = Card::query();
        $cards = $query->paginate(12); // Obtener las cartas paginadas
        return view('create-collection', compact('cards'));
    }

    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tus colecciones.');
        }

        $collections = $user->collections;

        return view('collections.index', compact('collections'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'selected_cards' => 'required|string',
        ]);

        // Crear la colección
        $collection = Collection::create([
            'user_id' => auth()->id(), // Asignar el usuario autenticado
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Asociar las cartas seleccionadas
        $selectedCards = explode(',', $request->selected_cards);
        $collection->cards()->attach($selectedCards);

        return redirect()->route('collections.create')->with('success', 'Colección creada correctamente.');
    }

    public function show($id)
    {
        $collection = Collection::with('cards')->findOrFail($id);
        return view('collections.show', compact('collection'));
    }


    public function random()
    {
        $collections = Collection::with('user')->inRandomOrder()->get();
        return view('collections.random', compact('collections'));
    }

}
