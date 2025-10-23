<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdenaHistoriaController extends Controller
{
    /**
     * Muestra la vista del minijuego Ordena la Historia.
     */
    public function index()
    {
        return view('juegos.ordenaHistoria');
    }
}
