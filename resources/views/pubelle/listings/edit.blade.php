@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Editar Publicación</h1>
        <form action="{{ route('listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="card_id" class="block text-gray-700">Carta</label>
                <select name="card_id" id="card_id" class="form-control" required>
                    @foreach ($cards as $card)
                        <option value="{{ $card->id }}" {{ $listing->card_id == $card->id ? 'selected' : '' }}>{{ $card->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Precio</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ $listing->price }}" required>
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-gray-700">Cantidad</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $listing->quantity }}" required>
            </div>
            <div class="mb-4">
                <label for="condition" class="block text-gray-700">Condición</label>
                <select name="condition" id="condition" class="form-control" required>
                    <option value="new" {{ $listing->condition == 'new' ? 'selected' : '' }}>Nuevo</option>
                    <option value="used" {{ $listing->condition == 'used' ? 'selected' : '' }}>Usado</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="photo" class="block text-gray-700">Foto</label>
                <input type="file" name="photo" id="photo" class="form-control">
                @if ($listing->photo)
                    <img src="{{ asset('storage/' . $listing->photo) }}" alt="Foto de la publicación" class="w-24 h-24 mt-2">
                @endif
            </div>
            <div class="mb-4">
                <label for="comment" class="block text-gray-700">Comentario</label>
                <textarea name="comment" id="comment" class="form-control">{{ $listing->comment }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Publicación</button>
        </form>
    </div>
@endsection
