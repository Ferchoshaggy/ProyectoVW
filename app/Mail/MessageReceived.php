<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;
    public $subject;
    public $modulo;

    public function __construct($titulo,$data,$modulo)
    {
        $this->datos = $data;
        $this->subject=$titulo;
        $this->modulo=$modulo;
}

    public function build()
    {
if($this->modulo=="users"){
    return $this->view('emails.message-received');
}
if($this->modulo=="ticket"){
return $this->view('emails.ticket_levantado');
}


    }
}
