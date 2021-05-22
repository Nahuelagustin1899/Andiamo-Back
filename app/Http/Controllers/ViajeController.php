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
        
        $data = $request->all();

        $viaje = Viaje::create($data);
    
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
