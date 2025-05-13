@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <a href="{{ route('vulnerabilidades.index') }}" class="btn btn-secondary mb-3">← Volver</a>
        <div class="card">
            @if($vulnerabilidad->imagen)
                <img src="{{ asset('storage/' . $vulnerabilidad->imagen) }}" class="card-img-top" alt="{{ $vulnerabilidad->nombre }}">
            @endif
            <div class="card-body">
                <h1 class="card-title">{{ $vulnerabilidad->nombre }}</h1>
                <span class="badge bg-{{ $vulnerabilidad->severidad == 'critica' ? 'danger' : ($vulnerabilidad->severidad == 'alta' ? 'warning' : 'info') }}">{{ ucfirst($vulnerabilidad->severidad) }}</span>
                <p class="mt-3">{!! nl2br(e($vulnerabilidad->descripcion)) !!}</p>
                <hr>
                <h4>Solución:</h4>
                <p>{!! nl2br(e($vulnerabilidad->solucion)) !!}</p>
            </div>
        </div>
    </div>
@endsection
