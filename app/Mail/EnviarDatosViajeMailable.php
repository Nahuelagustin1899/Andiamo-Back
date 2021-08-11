<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarDatosViajeMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $viaje;
    public $asiento_reservado;
    public $subject = "Información de la reserva";
    public $qr;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($user,$viaje,$asiento_reservado)
    {
     $this->user = $user;
     $this->viaje = $viaje;
     $this->asiento_reservado = $asiento_reservado;

     $this->qr = 'Nombre: '.$user->name.'// Email: '.$user->email.'// Salida :'.$viaje->salida->nombre.'// Destino: '.$viaje->destino->nombre.'// Precio: $'.$viaje->precio.'// Asiento: '.$asiento_reservado;

    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.datos-viajes',['user'=>$this->user,'viaje'=>$this->viaje,'qr'=>$this->qr,'asiento_reservado'=>$this->asiento_reservado]);
    }
}
