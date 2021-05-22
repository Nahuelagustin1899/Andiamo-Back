<?php

namespace App\Http\Controllers;
use App\Models\Reserva;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {   
        $reservas = Reserva::where('usuario_id', auth()->id)->get();
        return response()->json($reservas, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exist:usuarios',
            'viaje_id' => 'required|exist:viajes',
            'asiento_id' => 'required|exist:asientos',
        ]);

        $reserva = Reserva::create($request->all());

        return response()->json($reserva, 201);
    }

    public function change($id)
    {

        $reserva = Reserva::findOrFail($id);

        $reserva->estado = !$reserva->estado;
        $reserva->update();

        return response()->json($reserva, 200);
    }

}
