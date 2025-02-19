<?php
// app/Http/Controllers/UserCollectionController.php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCollectionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tus colecciones.');
        }

        $collections = $user->collections;

        return view('collections.index', compact('collections'));
    }
    public function create(){}

    public function show(Request $request){}

    public function random()
    {
        // Obtener colecciones aleatorias junto con los usuarios relacionados
        $collections = Collection::with('user')->inRandomOrder()->get();

        // Verificar si hay colecciones
        if ($collections->isEmpty()) {
            return view('collections.random', ['message' => 'No hay colecciones disponibles.']);
        }

        // Retornar vista con las colecciones aleatorias
        return view('collections.random', compact('collections'));
    }
}
