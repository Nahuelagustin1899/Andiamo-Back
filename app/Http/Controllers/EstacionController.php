<?php

namespace App\Http\Controllers;
use App\Models\Estacion;


use Illuminate\Http\Request;

class EstacionController extends Controller
{
    public function index()
    {
        $estaciones = Estacion::all();
        return response()->json($estaciones, 200);
    }

    
}
