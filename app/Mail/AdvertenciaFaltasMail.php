<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdvertenciaFaltasMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function build()
    {
        return $this->subject('Advertencia: 3 faltas registradas')
            ->view('emails.advertencia_faltas');
    }
}
