<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller; // Usamos la clase base para claridad si no extiendes de base Controller

class TriviaController extends Controller
{
    /**
     * Muestra la vista de inicio de la Trivia (el index de minijuegos).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // La lógica de inicio de la trivia, como cargar la primera pregunta, irá en el JavaScript.
        // Aquí solo devolvemos la vista principal.
        
        // La vista se llama 'trivia' (que apunta a resources/views/trivia.blade.php)
        return view('mundiales.trivia'); 
    }

    /**
     * Procesaría la respuesta de una pregunta de trivia vía AJAX.
     * (Lo implementaremos más adelante).
     */
    // public function checkAnswer(Request $request)
    // {
    //     // Lógica para validar la respuesta del usuario, actualizar el puntaje
    //     // y devolver la siguiente pregunta.
    // }
}