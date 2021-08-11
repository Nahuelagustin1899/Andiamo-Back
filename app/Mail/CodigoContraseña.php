<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CodigoContraseña extends Mailable
{
    use Queueable, SerializesModels;

    
    public $subject = "Código para restrablecer contraseña";
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($random)
    {
     $this->random = $random;

    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.codigo',['random'=>$this->random]);
    }
}
