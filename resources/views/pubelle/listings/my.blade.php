@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold text-center mb-6 text-indigo-600">Mis Publicaciones</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($listings as $listing)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <!-- Imagen de la carta -->
                    @if ($listing->photo)
                        <img src="{{ asset('storage/listings/' . $listing->photo) }}" alt="{{ $listing->card->name }}" class="w-24 h-32 object-cover mb-4 mx-auto">
                    @else
                        <img src="{{ asset('images/default-listing.png') }}" alt="Imagen por defecto" class="w-24 h-32 object-cover mb-4 mx-auto">
                    @endif

                    <!-- Detalles del listing -->
                    <h3 class="font-semibold text-lg mb-2">{{ $listing->card->name }}</h3>
                    <p class="text-gray-700"><span class="font-semibold">Precio:</span> ${{ $listing->price }}</p>
                    <p class="text-gray-700"><span class="font-semibold">Cantidad:</span> {{ $listing->quantity }}</p>
                    <p class="text-gray-700"><span class="font-semibold">Condición:</span> {{ $listing->condition }}</p>
                    <p class="text-gray-700"><span class="font-semibold">Descripción:</span> {{ $listing->description }}</p>

                    <!-- Botón de Editar -->
                    <div class="mt-4 text-center">
                        <a href="{{ route('listings.edit', $listing) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                            Editar
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="mt-6 flex justify-center">
            {{ $listings->links() }}
        </div>
    </div>
@endsection
