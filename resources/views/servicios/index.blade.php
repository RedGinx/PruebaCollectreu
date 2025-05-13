@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Nuestros Servicios</h1>

        {{-- Filtro por categoría --}}
        <form method="GET" action="{{ route('servicios.index') }}" class="mb-6">
            <div class="flex gap-2 items-center">
                <select name="categoria" class="p-2 border rounded">
                    <option value="">Todas las categorías</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filtrar</button>
                <a href="{{ route('servicios.index') }}" class="text-sm text-red-500 underline ml-2">Quitar filtros</a>
            </div>
        </form>

        {{-- Servicios --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($servicios as $servicio)
                <div class="p-4 border rounded shadow">
                    <h2 class="text-lg font-semibold">{{ $servicio->nombre }}</h2>
                    <p class="text-sm text-gray-600">{{ $servicio->descripcion_corta }}</p>
                    <a href="#" class="text-blue-500 underline text-sm mt-2 inline-block">Ver más</a>
                </div>
            @empty
                <p>No hay servicios para esta categoría.</p>
            @endforelse
        </div>
    </div>
@endsection
