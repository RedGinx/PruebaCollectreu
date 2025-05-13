@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <!-- Título principal -->
        <h1 class="text-4xl font-bold text-center mb-6 text-indigo-600">Crear Colección</h1>

        <!-- Formulario para crear la colección -->
        <form method="POST" action="{{ route('collections.store') }}" class="mb-8 bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold text-gray-700">Nombre de la colección</label>
                <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-semibold text-gray-700">Descripción</label>
                <textarea name="description" id="description" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>

            <!-- Campo oculto para almacenar las cartas seleccionadas -->
            <input type="hidden" name="selected_cards" id="selected_cards">

            <div class="text-center">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-200">
                    Crear Colección
                </button>
            </div>
        </form>

        <!-- Sección para seleccionar cartas -->
        <h2 class="text-2xl font-bold text-center mb-6 text-indigo-600">Selecciona las cartas</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($cards as $card)
                @php
                    $imagePath = public_path('storage/images/' . $card->key . '.png');
                @endphp

                <div class="bg-white p-6 rounded-lg shadow-lg cursor-pointer hover:shadow-2xl transition-all duration-200" onclick="selectCard({{ $card->id }})">
                    <!-- Encabezado de la carta -->
                    <div class="bg-green-500 p-3 rounded-t-lg mb-4">
                        <p class="text-white font-bold">Nombre: {{ $card->key }}</p>
                    </div>

                    <!-- Cuerpo de la carta -->
                    <div class="card-body">
                        <p class="text-gray-700 mb-1"><span class="font-semibold">Número:</span> {{ $card->number }}</p>
                        <p class="text-gray-700 mb-2"><span class="font-semibold">Expansión:</span> {{ $card->expansion }}</p>
                        @if (File::exists($imagePath))
                            <img src="{{ asset('storage/images/' . $card->key . '.png') }}" alt="{{ $card->key }}" class="mx-auto w-40 h-auto">
                        @else
                            <img src="{{ asset('storage/images/backcard.png') }}" alt="Carta no disponible" class="mx-auto w-40 h-auto">
                        @endif
                    </div>

                    <!-- Pie de la carta -->
                    <div class="mt-4 text-center">
                        <p class="text-sm text-gray-600">Código: {{ $card->name }} - {{ $card->expansion_alt }} - {{ $card->number }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="mt-6 flex justify-center">
            {{ $cards->links('pagination::tailwind') }}
        </div>
    </div>

    <!-- Script para manejar la selección de cartas -->
    <script>
        let selectedCards = [];

        function selectCard(cardId) {
            const cardElement = document.querySelector(`[onclick="selectCard(${cardId})"]`);

            if (selectedCards.includes(cardId)) {
                // Si la carta ya está seleccionada, la deseleccionamos
                selectedCards = selectedCards.filter(id => id !== cardId);
                cardElement.classList.remove('border-4', 'border-indigo-600');
            } else {
                // Si la carta no está seleccionada, la agregamos
                selectedCards.push(cardId);
                cardElement.classList.add('border-4', 'border-indigo-600');
            }

            // Actualizamos el campo oculto con las cartas seleccionadas
            document.getElementById('selected_cards').value = selectedCards.join(',');
        }
    </script>
@endsection
