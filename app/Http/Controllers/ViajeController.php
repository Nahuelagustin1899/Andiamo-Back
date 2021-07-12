<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viaje;
use App\Models\Empresa;
use App\Models\Estacion;
use App\Http\Requests\ViajeRequest;
use App\Mail\EditarViaje;
use Mail;

class ViajeController extends Controller
{
    public function index()
    {
        $viajes = Viaje::with(['empresa', 'destino', 'salida'])->get();
        return response()->json(['success' => true,'data' => $viajes]);
    }

    public function indexEmpresa()
    {
        $viajes = Viaje::with(['empresa', 'destino', 'salida'])->where('empresa_id', 5)->get();
        return response()->json(['data' => $viajes]);
        
    }

    public function indexTraerSelect()
    {
        $viajes = Empresa::where('id',5)->get();

        return response()->json(['data' => $viajes]);
        
    }

    public function indexTraerSelect2()
    {
        $viajes = Estacion::all();

        return response()->json(['data' => $viajes]);
        
    }

    public function edit(Request $request,$id)  
    {
        
        $viaje = Viaje::findOrFail($id);  
        $data = $request->all();
        $viaje->update($data);

        $correo = new EditarViaje($viaje->empresa,$viaje,$viaje->salida,$viaje->destino);    
        Mail::to('nahuellopez@gmail.com')->send($correo);
        return response()->json(['data' => $viaje]);

    }
    

    public function store(Request $request)
    {
        
        $validate = $request->validate([

            'destino_id' => 'required|exists:estacions,id',
            'salida_id' => 'required|exists:estacions,id',
            'empresa_id' => 'required|exists:empresas,id', 
            /* 'nombre' => 'required|min:2|max:40',  */
            'precio' => 'required|numeric',
            'fecha_salida' => 'required',
            'fecha_llegada' => 'required'
        ]); 
         
        $data = $request->all();
        $viaje = Viaje::create($data);

        return response()->json(['success' => true,'data' => $viaje]);
    }

    public function delete($id)
    {
        $viaje = Viaje::findOrFail($id);

        $viaje->delete();

        return response()->json(['success' => true, 'data' => $viaje]);
    }

    public function show($id)
    {
        $viaje = Viaje::findOrFail($id);

        return response()->json($viaje, 200);
    }

}
