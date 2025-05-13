@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <!-- Título principal -->
        <h1 class="text-4xl font-bold text-center mb-6 text-indigo-600">CATÁLOGO</h1>
        <p class="text-xl text-center mb-6 text-gray-700">¡HOLA! Explora nuestro catálogo de cartas.</p>

        <!-- Filtro -->
        <form method="GET" action="{{ route('index') }}" class="mb-8 bg-white p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Filtro por nombre -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-600 mb-2">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ request('name') }}"
                           class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                </div>

                <!-- Filtro por número -->
                <div>
                    <label for="number" class="block text-sm font-semibold text-gray-600 mb-2">Número de colección</label>
                    <input type="text" name="number" id="number" value="{{ request('number') }}"
                           class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                </div>

                <!-- Filtro por expansión -->
                <div>
                    <label for="expansion" class="block text-sm font-semibold text-gray-600 mb-2">Expansión</label>
                    <input type="text" name="expansion" id="expansion" value="{{ request('expansion') }}"
                           class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                </div>
            </div>

            <!-- Botón de filtro -->
            <div class="mt-6 text-center">
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-200">
                    Aplicar Filtro
                </button>
            </div>
        </form>

        <!-- Cartas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($cards as $card)
                @php
                    $imagePath = public_path('storage/images/' . $card->key . '.png');
                    $imgUrl = File::exists($imagePath)
                                ? asset('storage/images/' . $card->key . '.png')
                                : asset('storage/images/backcard.png');
                @endphp

                    <!-- Se agregan atributos data-* para pasar la información al modal -->
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-200 cursor-pointer"
                     onclick="openCardModal(this)"
                     data-key="{{ $card->key }}"
                     data-number="{{ $card->number }}"
                     data-expansion="{{ $card->expansion }}"
                     data-name="{{ $card->name }}"
                     data-expansion_alt="{{ $card->expansion_alt }}"
                     data-image="{{ $imgUrl }}">
                    <!-- Encabezado de la carta -->
                    <div class="bg-indigo-600 p-3 rounded-t-lg mb-4">
                        <p class="text-white font-semibold text-center">{{ $card->key }}</p>
                    </div>

                    <!-- Cuerpo de la carta -->
                    <div class="card-body">
                        <p class="text-gray-700 mb-2"><span class="font-semibold">Número:</span> {{ $card->number }}</p>
                        <p class="text-gray-700 mb-4"><span class="font-semibold">Expansión:</span> {{ $card->expansion }}</p>

                        <!-- Imagen de la carta -->
                        <img src="{{ $imgUrl }}"
                             alt="{{ $card->key }}"
                             class="mx-auto w-40 h-auto hover:scale-105 transition-transform duration-200">
                    </div>

                    <!-- Pie de la carta -->
                    <div class="card-footer mt-4 text-center">
                        <p class="text-sm text-gray-600">{{ $card->name }} - {{ $card->expansion_alt }} - {{ $card->number }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal (inicialmente oculto) -->
    <div id="cardModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg relative max-w-md w-full">
            <button onclick="closeCardModal()" class="absolute top-2 right-2 text-gray-700 text-2xl">&times;</button>
            <div id="modalContent">
                <!-- Aquí se insertará la información de la carta -->
            </div>
        </div>
    </div>
    <div class="mt-6 flex justify-center">
        {{ $cards->links('pagination::tailwind') }}
    </div>
@endsection

@push('scripts')
    <script>
        function openCardModal(element) {
            // Se recupera la información de la carta mediante los atributos data-*
            var key           = element.getAttribute('data-key');
            var number        = element.getAttribute('data-number');
            var expansion     = element.getAttribute('data-expansion');
            var name          = element.getAttribute('data-name');
            var expansionAlt  = element.getAttribute('data-expansion_alt');
            var image         = element.getAttribute('data-image');

            // Se construye el contenido HTML para el modal
            var modalHTML = `
                <div class="text-center mb-4">
                    <img src="${image}" alt="${key}" class="mx-auto w-40 h-auto">
                </div>
                <h2 class="text-2xl font-bold text-center mb-2">${key}</h2>
                <p class="text-gray-700 text-center mb-1"><strong>Número:</strong> ${number}</p>
                <p class="text-gray-700 text-center mb-1"><strong>Expansión:</strong> ${expansion}</p>
                <p class="text-gray-700 text-center mb-1"><strong>Nombre:</strong> ${name}</p>
                <p class="text-gray-700 text-center"><strong>Expansión Alterna:</strong> ${expansionAlt}</p>
            `;

            // Se inserta el contenido en el modal
            document.getElementById('modalContent').innerHTML = modalHTML;
            // Se muestra el modal removiendo la clase hidden
            document.getElementById('cardModal').classList.remove('hidden');
        }

        function closeCardModal() {
            // Se oculta el modal agregando la clase hidden
            document.getElementById('cardModal').classList.add('hidden');
        }
    </script>
@endpush
