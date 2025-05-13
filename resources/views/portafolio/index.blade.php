@extends('layouts.app')

@section('title', 'Portafolio')

@section('content')
    <div class="container">
        <h1 class="my-4">Nuestros Portafolios</h1>

        <div class="row">
            @foreach($portafolios as $portafolio)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/'.$portafolio->imagen) }}" class="card-img-top" alt="{{ $portafolio->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $portafolio->nombre }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($portafolio->descripcion, 100) }}</p>
                            <a href="{{ route('portafolio.show', $portafolio->id) }}" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
