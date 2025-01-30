<?php

use App\Models\Carta;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/index', [IndexController::class, 'index'])->name('index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pokedex', function () {
	$cartas = Carta::all();
	return view('pokedex', ['cartas' => $cartas]);
});

Route::get('/index2', function(){
	$cartas = Carta::paginate(20);
	return view('index', ['cartas' => $cartas]);
});
