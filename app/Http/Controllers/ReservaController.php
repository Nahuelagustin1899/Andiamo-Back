<?php

namespace App\Http\Controllers;
use App\Models\Reserva;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
    *@param null
    *@method retorna todas las empresas
    *@return json
    *@author
    *28-05-2021
    */
    public function index()
    {   
        $reservas = Reserva::where('usuario_id', auth()->id)->get();
        return response()->json($reservas, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exist:users,id',
            'viaje_id' => 'required|exist:viajes,id',
        ]);

        $reserva = Reserva::create([
            'user_id' => $request->user_id,
            'viaje_id' => $request->viaje_id,
        ]);

        return response()->json($reserva, 201);
    }

    public function change($id)
    {
        /** Retorna 422 en caso de no existir */
        $reserva = Reserva::findOrFail($id);
        $reserva->estado = !$reserva->estado;
        $reserva->update();

        return response()->json($reserva, 200);
    }

}
