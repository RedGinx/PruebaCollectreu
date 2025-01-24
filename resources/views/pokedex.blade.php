<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>POKEDEX</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <h1>CATÁLOGO</h1>
        <p>¡HOLA!</p>
        <div class="container">
            <div class="row g-3">
                @foreach ($cartas as $index => $carta)
                @php
                $imagePath = public_path('storage/images/' . $carta->key . '.png');
                @endphp
                    <div class="col col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header bg-success">
                                <p class="text-white">Nombre: {{ $carta->key }}</p>
                            </div>
                            <div class="card-body">
                                <p>Número de colección: {{ $carta->number }}</p>
                                <p>Expansión: {{ $carta->expansion }}</p>
                                @if (File::exists($imagePath))
                                    <img src="{{ asset('storage/images/' . $carta->key . '.png') }}" width="200">
                                @else
                                    <img src="{{ asset('storage/images/backcard.png') }}" width="200">
                                @endif
                            </div>
                            <div class="card-footer">
                                <p>Código: {{ $carta->name }} - {{ $carta->expansion_alt }} - {{ $carta->number }}</p>
                            </div>
                        </div>
                    </div>
                    
                    @if (($index + 1) % 3 === 0)
                        </div><div class="row g-3">
                    @endif
                @endforeach
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
