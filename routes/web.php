<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ModlistController;
use App\Http\Controllers\ModlinkController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {

    Route::get('/games', [GameController::class, "index"])->name('games');
    Route::get('/games-show/{id}', [GameController::class, "show"]);
    Route::get('/games-show/{game}', 'ModlistController@create');

    Route::get('/lists', [ModlistController::class, "index"]);
    Route::get('/lists-create', [ModlistController::class, "create"])->name('lists-create');
    Route::post('/lists-store', [ModlistController::class, "store"]);
    Route::get('games-show/lists-show/{id}', [ModlistController::class, "show"]);
    Route::get('/games-show/lists-show/{list}', 'ModlinkController@create');
    Route::delete('/lists/{id}', [ModlistController::class, "destroy"])->name('lists.destroy');

    Route::get('/lists/{list}/edit', [ModlistController::class, "edit"])->name('lists.edit');
    Route::put('/lists/{list}', [ModlistController::class, "update"])->name('lists.update');
    
    Route::get('/links', [ModlinkController::class, "index"]);
    
    Route::middleware('checkUserId')->group(function () {
    Route::get('/links-create', [ModlinkController::class, "create"])->name('links-create');
    });
    Route::post('/links-store', [ModlinkController::class, "store"]);
    Route::get('/links/{editModlink}/edit', [ModlinkController::class, "edit"])->name('links.edit');
    Route::put('/links/{editModlink}', [ModlinkController::class, "update"])->name('links.update');
    Route::delete('/links/{id}', [ModlinkController::class, "destroy"])->name('links.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth',"admin")->group(function () {
    Route::get('/games-create', [GameController::class, "create"]);
    Route::post('/games-store', [GameController::class, "store"]);
    Route::get('/games/{game}/edit', [GameController::class, "edit"])->name('games.edit');
    Route::put('/games/{game}', [GameController::class, "update"])->name('games.update');


});
require __DIR__.'/auth.php';


