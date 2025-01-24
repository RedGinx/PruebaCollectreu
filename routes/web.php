<?php

use App\Models\carta;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pokedex', function () {
	$cartas = Carta::all();
	return view('pokedex', ['cartas' => $cartas]);
});