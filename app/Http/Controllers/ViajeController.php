<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viaje;
use App\Request\ViajeRequest;

class ViajeController extends Controller
{
    public function index()
    {
        $viajes = Viaje::all();
        return response()->json($viajes, 200);
    }

    public function store(ViajeRequest $request)
    {

        $viaje = Viaje::create([
            'empresa_id' => $request->empresa_id,
            'salida_id' => $request->salida_id,
            'destino_id' => $request->destino_id,
            'fecha_salida' => $request->fecha_salida,
            'fecha_llegada' => $request->fecha_llegada,
            'cantidad_asientos' => $request->cantidad_asientos,
            'precio' => $request->precio,
        ]);

        return response()->json($viaje, 201);
    }

    public function delete($id)
    {
        $viaje = Viaje::findOrFail($id);

        $viaje->delete();

        return response()->json($viaje, 200);
    }

    public function show($id)
    {
        $viaje = Viaje::findOrFail($id);

        return response()->json($viaje, 200);
    }

}
