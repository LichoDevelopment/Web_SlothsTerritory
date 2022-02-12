<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WebConsultingMail extends Mailable

{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $message;
    public $subject;
    public $clientName;
    public function __construct($message, $subject, $clientName)
    {
        $this->subject = $subject;
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
        return $this->from(env('MAIL_FROM_ADDRESS'), "Sloth's Territory")
                    ->subject($this->subject)
                    ->with([
                        'message' => $this->message,
                        'clientName' => $this->clientName
                        ])
                    ->markdown('correo.web-consulting');
    }
}
