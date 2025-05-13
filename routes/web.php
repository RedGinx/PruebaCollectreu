<?php

use App\Http\Controllers\CategoriaServicioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\VulnerabilidadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

use App\Http\Controllers\PortafolioController;

Route::get('/portafolio', [PortafolioController::class, 'index'])->name('portafolio.index');
Route::get('/portafolio/{id}', [PortafolioController::class, 'show'])->name('portafolio.show');


Route::get('/vulnerabilidades', [VulnerabilidadController::class, 'index'])->name('vulnerabilidades.index');
Route::get('/vulnerabilidades/{vulnerabilidad}', [VulnerabilidadController::class, 'show'])->name('vulnerabilidades.show');

Route::get('/categorias', [CategoriaServicioController::class, 'index'])->name('categorias.index');
Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');
