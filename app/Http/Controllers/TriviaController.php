<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TriviaController extends Controller
{
    /**
     * Muestra la vista de inicio de la Trivia (el index de minijuegos).
     */
    public function index()
    {
        // Solo cargamos la vista — la lógica dinámica está en el JS.
        return view('mundiales.trivia');
    }

    /**
     * Aquí luego se podrá procesar respuestas vía AJAX.
     */
    // public function checkAnswer(Request $request)
    // {
    //     // Lógica para validar la respuesta, actualizar puntaje, etc.
    // }
}
