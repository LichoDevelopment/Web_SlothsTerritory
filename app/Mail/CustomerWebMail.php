<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerWebMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $message;
    public $clientMail;
    public $clientName;
    public function __construct($message, $clientMail, $clientName)
    {
        $this->clientMail = $clientMail;
        $this->message = $message; 
        $this->clientName = $clientName;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->clientMail, "Sloth's Territory")
                ->subject('Consulta web')
                ->with([
                    'message' => $this->message,
                    'clientName' => $this->clientName
                    ])
                ->markdown('correo.customer-web-mail');
    }
}
