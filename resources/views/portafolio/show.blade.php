<?php
@extends('layouts.app')

@section('title', $portafolio->nombre)

@section('content')
    <div class="container">
        <h1 class="my-4">{{ $portafolio->nombre }}</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/'.$portafolio->imagen) }}" class="img-fluid" alt="{{ $portafolio->nombre }}">
            </div>
            <div class="col-md-6">
                <h4>Descripción</h4>
                <p>{{ $portafolio->descripcion }}</p>
                <h4>Categoría</h4>
                <p>{{ $portafolio->categoria->nombre }}</p> <!-- Suponiendo que la relación con Categoría exista -->
                <a href="{{ $portafolio->slug }}" class="btn btn-success" target="_blank">Visitar proyecto</a>
            </div>
        </div>
    </div>
@endsection
