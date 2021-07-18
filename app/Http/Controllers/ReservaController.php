<?php

namespace App\Http\Controllers;
use App\Models\Reserva;
use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Mail\EnviarDatosViajeMailable;
use Mail;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    
    public function index()
    {   
        $usuario_log =  Auth::user()->id;  
        
        $reservas = Reserva::with(['user', 'viaje'])->where('user_id', $usuario_log)->get(); 
        /* $reservas = Reserva::with(['user', 'viaje'])->where('user_id', 3)->get(); */
        return response()->json(['data' => $reservas]);
    }

    public function indexEmpresa()
    {   
        
        $reservas = Empresa::with(['viajes', 'reservas'])->where('id', 5)->get();

        return response()->json(['data' => $reservas]);
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
