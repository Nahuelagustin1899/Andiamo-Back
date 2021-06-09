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
    public $subject = "Informacion de la reserva";
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($user,$viaje)
    {
     $this->user = $user;
     $this->viaje = $viaje;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.datos-viajes',['user'=>$this->user,'viaje'=>$this->viaje]);
    }
}
