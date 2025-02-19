<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\UserCollectionController;

Route::get('/indexOld',
    [IndexController::class, 'index'])->name('index');

/*Route::get('/', function () {
    return view('home');
});*/
Route::get('/', [IndexController::class, 'index2'])->name('pruebaindexnavbar');

Route::get('/pokedex', function () {
	$cards = Card::all();
	return view('pokedex', ['cartas' => $cards]);
});

Route::get('/index2', function(){
	$cards = Card::paginate(20);
	return view('index', ['cards' => $cards]);
});

Route::get('/create-collection', [IndexController::class, 'index'])->name('index');

Route::get('/collections/create', [CollectionController::class, 'create'])->name('collections.create');
Route::post('/collections', [CollectionController::class, 'store'])->name('collections.store');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/index', [CardController::class, 'index'])->name('pruebaindexnavbar');


Route::middleware('auth')->group(function () {
    Route::get('/collections', [CollectionController::class, 'index'])->name('collections.index');
});


Route::group(['middleware' => ['role:admin']], function () {
    Route::get("listausuarios", [UserCollectionController::class, "index"])->name("show.users.index");
    Route::resource("admin", UserCollectionController::class);
});

Route::group(['middleware' => ['role:admin']], function () {
    //TODO
});

Route::middleware('auth')->group(function () {
    // Ruta para ver la lista de colecciones del usuario
    Route::resource('/collections', CollectionController::class);

    // Ruta para el método personalizado 'random'

});
Route::get('/collections/random', [UserCollectionController::class, 'random'])->name('collections.random');


//  Route::get('/collections/random', [CollectionController::class, 'random'])->name('collections.random');

Route::resource('user', UserCollectionController::class);


Route::middleware('auth')->group(function () {
    // Ruta para ver colecciones aleatorias
    Route::get('/user/collections/random', [UserCollectionController::class, 'random'])->name('collections.random');
});
