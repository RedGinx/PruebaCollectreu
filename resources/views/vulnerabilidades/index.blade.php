@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Vulnerabilidades Comunes</h1>
        <div class="row">
            @foreach($vulnerabilidades as $vuln)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($vuln->imagen)
                            <img src="{{ asset('storage/' . $vuln->imagen) }}" class="card-img-top" alt="{{ $vuln->nombre }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $vuln->nombre }}</h5>
                            <span class="badge bg-{{ $vuln->severidad == 'critica' ? 'danger' : ($vuln->severidad == 'alta' ? 'warning' : 'info') }}">{{ ucfirst($vuln->severidad) }}</span>
                            <p class="card-text mt-2">{{ Str::limit($vuln->extracto ?? strip_tags($vuln->descripcion), 100) }}</p>
                            <a href="{{ route('vulnerabilidades.show', $vuln) }}" class="btn btn-primary btn-sm">Leer más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $vulnerabilidades->links() }}
        </div>
    </div>
@endsection
