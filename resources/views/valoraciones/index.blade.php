@foreach($valoraciones as $valoracion)
    <div class="p-4 border rounded mb-4">
        <p class="text-gray-700">"{{ $valoracion->contenido }}"</p>
        <p class="text-sm text-gray-500 mt-1">Valoración: {{ $valoracion->valoracion }}/5</p>

        @if($valoracion->servicios->isNotEmpty())
            <p class="text-sm text-gray-600 mt-2">Servicios valorados:
                {{ $valoracion->servicios->pluck('nombre')->implode(', ') }}
            </p>
        @endif
    </div>
@endforeach
