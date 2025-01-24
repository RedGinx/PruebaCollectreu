<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATÁLOGO</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold text-center mb-6 text-indigo-600">CATÁLOGO</h1>
        <p class="text-xl text-center mb-6">¡HOLA!</p>

        <!-- Filtro -->
        <form method="GET" action="{{ route('index') }}" class="mb-6">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Filtro por nombre -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-600">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ request('name') }}" class="w-full p-2 border rounded-lg">
                </div>

                <!-- Filtro por número -->
                <div>
                    <label for="number" class="block text-sm font-semibold text-gray-600">Número de colección</label>
                    <input type="text" name="number" id="number" value="{{ request('number') }}" class="w-full p-2 border rounded-lg">
                </div>

                <!-- Filtro por expansión -->
                <div>
                    <label for="expansion" class="block text-sm font-semibold text-gray-600">Expansión</label>
                    <input type="text" name="expansion" id="expansion" value="{{ request('expansion') }}" class="w-full p-2 border rounded-lg">
                </div>
            </div>

            <!-- Botón de filtro -->
            <div class="mt-4 text-center">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">Aplicar Filtro</button>
            </div>
        </form>

        <!-- Cartas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($cartas as $carta)
                @php
                    $imagePath = public_path('storage/images/' . $carta->key . '.png');
                @endphp
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="card-header bg-success mb-4">
                        <p class="text-white">Nombre: {{ $carta->key }}</p>
                    </div>
                    <div class="card-body">
                        <p>Número de colección: {{ $carta->number }}</p>
                        <p>Expansión: {{ $carta->expansion }}</p>
                        @if (File::exists($imagePath))
                            <img src="{{ asset('storage/images/' . $carta->key . '.png') }}" width="200" class="mx-auto">
                        @else
                            <img src="{{ asset('storage/images/backcard.png') }}" width="200" class="mx-auto">
                        @endif
                    </div>
                    <div class="card-footer">
                        <p>Código: {{ $carta->name }} - {{ $carta->expansion_alt }} - {{ $carta->number }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="mt-6 flex justify-center">
            {{ $cartas->links('pagination::tailwind') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</body>
</html>
