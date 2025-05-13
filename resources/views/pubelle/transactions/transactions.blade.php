@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <!-- Título principal -->
        <h1 class="text-4xl font-bold text-center mb-6 text-indigo-600">Comprar Carta: {{ $listing->card->name }}</h1>

        <!-- Formulario para comprar una carta -->
        <form action="{{ route('transactions.store', $listing) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label for="quantity" class="block text-sm font-semibold text-gray-700">Cantidad a comprar</label>
                <input type="number" name="quantity" min="1" max="{{ $listing->quantity }}" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="text-center">
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-200">
                    Comprar
                </button>
            </div>
        </form>
    </div>
@endsection
