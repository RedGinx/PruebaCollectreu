@extends('layouts.app') <!-- Asegúrate de que este layout exista -->

@section('content')
    <div class="container">
        <h1>Comprar {{ $listing->card->name }}</h1> <!-- Ajusta según tu modelo -->
        <p>Precio unitario: ${{ $listing->price }}</p>
        <p>Cantidad disponible: {{ $listing->quantity }}</p>

        <form action="{{ route('transactions.store', $listing) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="quantity">Cantidad a comprar:</label>
                <input type="number"
                       name="quantity"
                       id="quantity"
                       class="form-control"
                       min="1"
                       max="{{ $listing->quantity }}"
                       required>
            </div>
            <button type="submit" class="btn btn-primary">Comprar</button>
        </form>
    </div>
@endsection
