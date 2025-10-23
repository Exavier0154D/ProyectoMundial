<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HubController extends Controller
{
    // app/Http/Controllers/HubController.php

public function index()
{
    // Cambiamos 'hub' a 'mundiales.hub'
    return view('mundiales.hub'); 
}
}