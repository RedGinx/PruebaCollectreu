@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <!-- Título principal -->
        <h1 class="text-4xl font-bold text-center mb-6 text-indigo-600">{{ $card->name }}</h1>

        <!-- Descripción de la carta -->
        <p class="text-gray-700 text-center mb-8">{{ $card->description }}</p>

        <!-- Enlace para publicar una carta -->
        <div class="text-center mb-8">
            <a href="{{ route('listings.create', $card) }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-200">
                Publicar esta carta
            </a>
        </div>

        <!-- Lista de publicaciones -->
        <h2 class="text-2xl font-bold text-center mb-6 text-indigo-600">Publicaciones Disponibles</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($listings as $listing)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="font-semibold text-lg mb-2">{{ $listing->seller->name }}</h3>
                    <p class="text-gray-700"><span class="font-semibold">Precio:</span> ${{ $listing->price }}</p>
                    <p class="text-gray-700"><span class="font-semibold">Cantidad:</span> {{ $listing->quantity }}</p>
                    <p class="text-gray-700"><span class="font-semibold">Condición:</span> {{ $listing->condition }}</p>
                    <p class="text-gray-700"><span class="font-semibold">Descripción:</span> {{ $listing->description }}</p>

                    <!-- Enlace para comprar -->
                    <div class="mt-4 text-center">
                        <a href="{{ route('transactions.create', $listing) }}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-200">
                            Comprar
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
