<?php

namespace App\Http\Controllers;
use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Mail\EnviarDatosViajeMailable;
use Mail;

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
        return auth()->id;
        
        /* $reservas = Reserva::with(['user', 'viaje'])->where('user_id', auth()->id)->get(); */
        /* $reservas = Reserva::with(['user', 'viaje'])->where('user_id', 3)->get(); */
        /* return response()->json(['data' => $reservas]); */
    }
    

    public function reservasViajes($id)
    {   
        $reservas = Reserva::where('viaje_id', $id )->get();
        return response()->json(['data' => $reservas]);
    }

    public function store(Request $request)
    {

        $reserva = $request->all();
        $data = Reserva::create($reserva); 
        /* return $data->viaje->destino->nombre; */
        /* return $data->asiento_reservado; */
         $correo = new EnviarDatosViajeMailable($data->user, $data->viaje,$data->asiento_reservado);    
        Mail::to('nahuellopez@gmail.com')->send($correo);

        return response()->json(['data' => $data]);  
    }

 /*    public function change($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->estado = !$reserva->estado;
        $reserva->update();

        return response()->json(['data' => $reserva]);
    } */

}
