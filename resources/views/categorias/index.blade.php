@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Categorías de Servicios</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($categorias as $categoria)
                <a href="{{ route('servicios.index', ['categoria' => $categoria->id]) }}" class="p-4 border rounded hover:bg-gray-100">
                    <h2 class="text-xl font-semibold">{{ $categoria->nombre }}</h2>
                    <p>{{ $categoria->descripcion }}</p>
                </a>
            @endforeach
        </div>
    </div>
@endsection
