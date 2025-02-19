@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold text-center mb-6 text-indigo-600">Mis Colecciones</h1>

        @if ($collections->isEmpty())
            <p class="text-center text-gray-700">No tienes ninguna colección creada.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($collections as $collection)
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-200">
                        <h2 class="text-2xl font-bold mb-2 text-indigo-600">{{ $collection->name }}</h2>
                        <p class="text-gray-700 mb-4">{{ $collection->description }}</p>
                        <a href="{{ route('collections.show', $collection->id) }}" class="text-indigo-600 hover:underline">Ver detalles</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
