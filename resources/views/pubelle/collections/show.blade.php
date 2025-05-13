@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <!-- Encabezado de la colección -->
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-indigo-600">{{ $collection->name }}</h1>
            <p class="text-xl text-gray-700 mt-2">{{ $collection->description }}</p>
            <p class="text-gray-600 mt-2">Total de cartas: {{ $collection->cards->count() }}</p>
        </div>

        <!-- Grid de cartas -->
        @if($collection->cards->isEmpty())
            <p class="text-center text-gray-600">No hay cartas en esta colección.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($collection->cards as $card)
                    @php
                        // Verificamos si existe la imagen para la carta; de lo contrario se muestra una imagen por defecto.
                        $imagePath = public_path('storage/images/' . $card->key . '.png');
                        $imgUrl = File::exists($imagePath)
                                    ? asset('storage/images/' . $card->key . '.png')
                                    : asset('storage/images/backcard.png');
                    @endphp

                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-200">
                        <!-- Encabezado de la carta -->
                        <div class="bg-indigo-600 p-3 rounded-t-lg mb-4">
                            <p class="text-white font-semibold text-center">{{ $card->key }}</p>
                        </div>

                        <!-- Cuerpo de la carta -->
                        <div class="card-body">
                            <p class="text-gray-700 mb-2"><span class="font-semibold">Número:</span> {{ $card->number }}</p>
                            <p class="text-gray-700 mb-4"><span class="font-semibold">Expansión:</span> {{ $card->expansion }}</p>
                            <img src="{{ $imgUrl }}" alt="{{ $card->key }}" class="mx-auto w-40 h-auto hover:scale-105 transition-transform duration-200">
                        </div>

                        <!-- Pie de la carta -->
                        <div class="card-footer mt-4 text-center">
                            <p class="text-sm text-gray-600">{{ $card->name }} - {{ $card->expansion_alt }} - {{ $card->number }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Botón para volver a la lista de colecciones -->
        <div class="mt-8 text-center">
            <a href="{{ route('collections.index') }}" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                Volver a mis colecciones
            </a>
        </div>
    </div>
@endsection
