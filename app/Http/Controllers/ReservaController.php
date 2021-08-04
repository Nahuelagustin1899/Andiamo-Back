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
    /* Trae las reservas de los usuarios logueados */

    public function index()
    {   
        
        $reservas = Reserva::with(['user', 'viaje'])->where('user_id', auth()->id())->get()->toArray();
        
        return response()->json(['data' => $reservas]);
               
    }

    /* Trae las reservas de sus viajes de la empresa "5" */

    public function indexEmpresa()
    {   
        
        $reservas = Empresa::with(['viajes', 'reservas'])->where('id', 5)->get();

        return response()->json(['data' => $reservas]);
    }

    /* Trae todas las reservas */

    public function indexAdmin()
    {   
        
        $reservas = Empresa::with(['viajes', 'reservas'])->get();

        return response()->json(['data' => $reservas]);
    }

    /* Cada viaje tiene sus asientos */

    public function reservasViajes($id)
    {   
        $reservas = Reserva::where('viaje_id', $id )->get();

        return response()->json(['data' => $reservas]);
          
    }

    /* Reservar asiento disponible */

    public function store(Request $request)
    {

        $reserva = $request->all();
        $data = Reserva::create($reserva); 
        /* return $data->viaje->destino->nombre; */
        /* return $data->asiento_reservado; */
         $correo = new EnviarDatosViajeMailable($data->user, $data->viaje,$data->asiento_reservado);    
        Mail::to('martin@vilas.com')->send($correo);

        return response()->json(['data' => $data]);  
    }



}
