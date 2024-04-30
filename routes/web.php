<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ModlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/games', [GameController::class, "index"]);
    Route::get('/games-create', [GameController::class, "create"]);
    Route::post('/games-store', [GameController::class, "store"]);
    Route::get('/games-show/{id}', [GameController::class, "show"]);

    Route::get('/lists', [ModlistController::class, "index"]);
    Route::get('/lists-create', [ModlistController::class, "create"]);
    Route::post('/lists-store', [ModlistController::class, "store"]);
    Route::get('/lists-show/{id}', [ModlistController::class, "show"]);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
