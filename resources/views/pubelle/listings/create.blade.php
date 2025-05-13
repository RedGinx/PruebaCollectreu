@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">Selecciona una carta para listar</h1>

        {{-- Formulario de búsqueda --}}
        <form method="GET" action="{{ route('listings.create') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Buscar por nombre" value="{{ request('name') }}">
                <input type="text" name="number" class="form-control" placeholder="Número de colección" value="{{ request('number') }}">
                <input type="text" name="expansion" class="form-control" placeholder="Expansión" value="{{ request('expansion') }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        {{-- Lista de cartas --}}
        <div class="card-list row">
            @foreach ($cards as $card)
                <div class="card-item col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/cards/' . $card->image) }}" class="card-img-top" alt="{{ $card->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $card->name }}</h5>
                            <p class="card-text">Expansión: {{ $card->expansion }}</p>
                            <form method="POST" action="{{ route('listings.store') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="card_id" value="{{ $card->id }}">
                                <div class="mb-2">
                                    <label>Precio: <input type="number" name="price" step="0.01" required class="form-control"></label>
                                </div>
                                <div class="mb-2">
                                    <label>Condición:
                                        <select name="condition" class="form-select">
                                            <option value="new">Nueva</option>
                                            <option value="used">Usada</option>
                                            <option value="damaged">Dañada</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="mb-2">
                                    <label>Comentario: <textarea name="comment" class="form-control"></textarea></label>
                                </div>
                                <div class="mb-2">
                                    <label>Subir foto opcional: <input type="file" name="photo" class="form-control"></label>
                                </div>
                                <button type="submit" class="btn btn-success">Listar esta carta</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Paginación --}}
        <div class="d-flex justify-content-center">
            {{ $cards->links() }}
        </div>
    </div>
@endsection
