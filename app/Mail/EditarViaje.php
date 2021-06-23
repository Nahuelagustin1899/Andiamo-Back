<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EditarViaje extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Informacion del viaje modificado";
    public $empresa;
    public $precio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($empresa,$precio)
    {
        $this->empresa = $empresa;
        $this->precio = $precio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.editar-pasaje',['empresa'=>$this->empresa, 'precio'=>$this->precio]);
    }
}
