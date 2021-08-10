<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viaje;
use App\Models\Empresa;
use App\Models\Estacion;
use App\Http\Requests\ViajeRequest;
use App\Mail\EditarViaje;
use App\Mail\BorrarPasaje;
use Mail;

class ViajeController extends Controller
{
    /* Trae todos los viajes */

    public function index()
    {
        $viajes = Viaje::with(['empresa', 'destino', 'salida'])->get();
        return response()->json(['success' => true,'data' => $viajes]);
    }

    /* Trae los viajes de la empresa "5" */

    public function indexEmpresa()
    {
        $viajes = Viaje::with(['empresa', 'destino', 'salida'])->where('empresa_id', 5)->get();
        return response()->json(['data' => $viajes]);
        
    }

    /* Trae la empresa nro 5 para crear viajes */

    public function indexTraerSelect()
    {
        $viajes = Empresa::where('id',5)->get();

        return response()->json(['data' => $viajes]);
        
    }

    /* Trae todas las estaciones */

    public function indexTraerSelect2()
    {
        $viajes = Estacion::all();

        return response()->json(['data' => $viajes]);
        
    }

    /* Edita los viajes */

    public function edit(Request $request,$id)  
    {
        
        $viaje = Viaje::findOrFail($id);  
        $data = $request->all();
        $viaje->update($data);

        $correo = new EditarViaje($viaje->empresa,$viaje,$viaje->salida,$viaje->destino);    
        Mail::to('martin@vilas.com')->send($correo);
        return response()->json(['data' => $viaje]);

    }

    /* Crea viajes */
    

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

    /* Elimina viajes */

    public function delete($id)
    {
        $viaje = Viaje::findOrFail($id);

        $viaje->delete();

        $correo = new BorrarPasaje($viaje->empresa,$viaje,$viaje->salida,$viaje->destino);    
        Mail::to('martin@vilas.com')->send($correo);

        return response()->json(['success' => true, 'data' => $viaje]);
    }

   /*  public function show($id)
    {
        $viaje = Viaje::findOrFail($id);

        return response()->json($viaje, 200);
    } */

}
