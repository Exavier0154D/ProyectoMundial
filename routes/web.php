<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MundialController;

// RUTA PRINCIPAL: El índice de los mundiales se carga directamente en la raíz de la aplicación.
Route::get('/', [MundialController::class, 'index'])->name('mundiales.index');

// RUTA DE DETALLE: Se mantiene para ver un mundial específico (ej: /mundiales/2022)
// Se mantiene el prefijo 'mundiales' para seguir la convención de URLs descriptivas.
Route::get('/mundiales/{mundial}', [MundialController::class, 'show'])->name('mundiales.show');;