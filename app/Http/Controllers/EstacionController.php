<?php

namespace App\Http\Controllers;
use App\Models\Estacion;


use Illuminate\Http\Request;

class EstacionController extends Controller
{

    /**
    *@param null
    *@method retorna todas las estaciones
    *@return json
    *@author
    *28-05-2021
    */
    public function index()
    {
        $estaciones = Estacion::all();
        return response()->json($estaciones, 200);
    }

}
