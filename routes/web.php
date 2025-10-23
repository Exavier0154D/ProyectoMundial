<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HubController;
use App\Http\Controllers\MundialController;
use App\Http\Controllers\JuegosController;
use App\Http\Controllers\TriviaController;
use App\Http\Controllers\AdivinaCampeonController;
use App\Http\Controllers\OrdenaHistoriaController; // ← NUEVO

// Rutas públicas
Route::get('/', [HubController::class, 'index'])->name('hub.index');

Route::get('/enciclopedia', [MundialController::class, 'index'])->name('mundiales.index');
Route::get('/enciclopedia/{mundial}', [MundialController::class, 'show'])->name('enciclopedia.show');

// Rutas protegidas (requieren login)
Route::middleware(['auth'])->group(function () {

    // Índice de juegos
    Route::get('/juegos', [JuegosController::class, 'index'])->name('juegos.index');

    // 1) Trivia
    Route::get('/juegos/trivia', [TriviaController::class, 'index'])->name('juegos.trivia');

    // 2) Adivina el Campeón
    Route::get('/juegos/adivina-campeon', [AdivinaCampeonController::class, 'index'])
        ->name('juegos.adivinacampeon');
    Route::post('/juegos/adivina-campeon/submit', [AdivinaCampeonController::class, 'submit'])
        ->name('juegos.adivinacampeon.submit');

    // 3) Ordena la Historia (NUEVO)
Route::get('/juegos/ordena-historia', [OrdenaHistoriaController::class, 'index'])
    ->name('juegos.ordenahistoria');


    // 4–8) Otros juegos (placeholders)
    Route::get('/juegos/mascotas', [JuegosController::class, 'mascotas'])->name('juegos.mascotas');
    Route::get('/juegos/goleador', [JuegosController::class, 'goleador'])->name('juegos.goleador');
    Route::get('/juegos/logos', [JuegosController::class, 'logos'])->name('juegos.logos');
    Route::get('/juegos/records', [JuegosController::class, 'records'])->name('juegos.records');
    Route::get('/juegos/sede', [JuegosController::class, 'sede'])->name('juegos.sede');
    Route::get('/juegos/banderas', [JuegosController::class, 'banderas'])->name('juegos.banderas');
});

// Auth scaffolding
Auth::routes();
