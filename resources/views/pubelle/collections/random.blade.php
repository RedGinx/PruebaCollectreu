@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-extrabold text-center text-indigo-600 mb-6">Colecciones Aleatorias</h1>

        @if(isset($message))
            <p class="text-center text-lg text-gray-700">{{ $message }}</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($collections as $collection)
                    <div class="bg-white rounded-lg shadow-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                        <h2 class="text-2xl font-semibold text-indigo-600 mb-3">{{ $collection->name }}</h2>
                        <p class="text-gray-700 mb-4">{{ $collection->description }}</p>
                        <p class="text-sm text-gray-500"><strong>Creada por:</strong> {{ $collection->user->name ?? 'Desconocido' }}</p>
                        <a href="{{ route('collections.show', $collection->id) }}" class="mt-4 inline-block bg-indigo-600 text-white py-2 px-4 rounded-lg text-sm font-semibold hover:bg-indigo-700 transition">Ver detalles</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
