<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BorrarViaje extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Pasaje eliminado";
    public $empresa;
    public $viaje;
    public $destino;
    public $salida;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($empresa,$viaje,$destino,$salida)
    {
        $this->empresa = $empresa;
        $this->viaje = $viaje;
        $this->destino = $destino;
        $this->salida = $salida;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.borrar-pasaje',['empresa'=>$this->empresa, 'viaje'=>$this->viaje,'destino'=>$this->destino,'salida'=>$this->salida]);
    }
}
