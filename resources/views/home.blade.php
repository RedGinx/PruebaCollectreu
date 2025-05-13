@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8 space-y-12">
        <!-- Tarjeta de Perfil -->
        <div class="max-w-4xl w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Encabezado -->
            <div class="bg-gradient-to-r from-indigo-600 to-blue-500 p-6 text-center">
                <h2 class="text-3xl font-bold text-white">Mi Perfil</h2>
            </div>
            <!-- Contenido del Perfil -->
            <div class="p-6 md:flex">
                <!-- Imagen de Avatar -->
                <div class="flex-shrink-0 flex justify-center md:justify-start">
                    <img class="w-32 h-32 rounded-full border-4 border-indigo-600"
                         src="{{ asset(Auth::user()->profile_picture ? 'storage/profile_pictures/' . Auth::user()->profile_picture : 'images/default-avatar.png') }}"
                         alt="Avatar de {{ Auth::user()->name }}">
                </div>
                <!-- Detalles del Usuario -->
                <div class="mt-6 md:mt-0 md:ml-8 flex-grow">
                    <h3 class="text-2xl font-semibold text-gray-800">{{ Auth::user()->name }}</h3>
                    <p class="text-gray-600">{{ Auth::user()->email }}</p>
                    <p class="mt-4 text-gray-700">
                        Bienvenido a tu perfil. Aquí puedes ver y actualizar tu información personal.
                        ¡Personaliza tu experiencia y mantente al tanto de tus actividades!
                    </p>
                    <div class="mt-4 flex space-x-4">
                        {{-- Si tienes definida la ruta para editar el perfil, descomenta la siguiente línea --}}
                        <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Editar Perfil</a>

                        {{-- <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Editar Perfil</a>
                        <a href="{{ route('password.change') }}" class="px-4 py-2 border border-indigo-600 text-indigo-600 rounded-lg hover:bg-indigo-50 transition">Cambiar Contraseña</a>--}}
                    </div>
                </div>
            </div>

            <!-- Información Adicional -->
            <div class="border-t bg-gray-50 p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="text-lg font-bold text-gray-800">Actividad Reciente</h4>
                        <ul class="mt-2 text-gray-600 list-disc list-inside">
                            <li>Último inicio de sesión: {{ Auth::user()->last_login ?? 'N/A' }}</li>
                            <li>Miembro desde: {{ Auth::user()->created_at->format('M d, Y') }}</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-800">Información Adicional</h4>
                        <ul class="mt-2 text-gray-600 list-disc list-inside">
                            <li>Rol: {{ Auth::user()->role ?? 'Usuario' }}</li>
                            {{-- Puedes agregar más datos aquí --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Tarjeta de Perfil -->

        <!-- Últimas 4 Colecciones Modificadas -->
        <div class="max-w-4xl w-full bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold text-indigo-600 mb-4">Colecciones Recientes</h2>
            @if ($collections->isEmpty())
                <p class="text-center text-gray-700">No tienes colecciones modificadas recientemente.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($collections as $collection)
                        <div class="bg-gray-50 p-4 rounded-lg shadow hover:shadow-lg transition">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $collection->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ $collection->description }}</p>
                           <a href="{{ route('collections.show', $collection->id) }}" class="text-indigo-600 hover:underline">Ver detalles</a>
                        </div>
                    @endforeach
                </div>
            @endif
            <!-- Sección de Transacciones -->
            <div class="max-w-4xl w-full bg-white shadow-lg rounded-lg p-6 mt-6">
                <h2 class="text-2xl font-bold text-indigo-600 mb-4">Mis Compras</h2>
                @if ($transactions->isEmpty())
                    <p class="text-center text-gray-700">No has realizado ninguna compra.</p>
                @else
                    <div class="space-y-4">
                        @foreach ($transactions as $transaction)
                            <div class="bg-gray-50 p-4 rounded-lg shadow hover:shadow-lg transition">
                                <h3 class="text-xl font-bold text-gray-800">
                                    Compra #{{ $transaction->id }}
                                </h3>
                                <p class="text-gray-600">
                                    <strong>Producto:</strong> {{ $transaction->listing->card->name ?? 'N/A' }}
                                </p>
                                <p class="text-gray-600">
                                    <strong>Cantidad:</strong> {{ $transaction->quantity }}
                                </p>
                                <p class="text-gray-600">
                                    <strong>Precio Total:</strong> ${{ $transaction->total_price }}
                                </p>
                                <p class="text-gray-600">
                                    <strong>Fecha:</strong> {{ $transaction->created_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                        @endforeach
                    </div>

                    <!-- Paginación -->
                    <div class="mt-6">
                        {{ $transactions->links() }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Fin Últimas Colecciones -->
    </div>
@endsection
