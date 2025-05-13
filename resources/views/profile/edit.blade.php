@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Encabezado -->
            <div class="bg-gradient-to-r from-indigo-600 to-blue-500 p-6 text-center">
                <h2 class="text-3xl font-bold text-white">Editar Perfil</h2>
            </div>

            <!-- Formulario de Edición -->
            <div class="p-6">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nombre -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Foto de Perfil -->
                    <div class="mb-6">
                        <label for="profile_picture" class="block text-sm font-medium text-gray-700">Foto de Perfil</label>
                        <input type="file" name="profile_picture" id="profile_picture"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('profile_picture')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @if (Auth::user()->profile_picture)
                            <div class="mt-4">
                                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Foto de Perfil" class="w-32 h-32 rounded-full">
                            </div>
                        @endif
                    </div>

                    <!-- Botón de Guardar -->
                    <div class="flex justify-end">
                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
