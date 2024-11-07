<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionTransporte extends Mailable
{
    use Queueable, SerializesModels;

    public $reserva;
    public $arrivalTime;
    public $numeroReserva;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Reserva $reserva
     * @param string $arrivalTime
     * @return void
     */
    public function __construct($reserva, $arrivalTime)
    {
        $this->reserva = $reserva;
        $this->arrivalTime = $arrivalTime;
        $this->numeroReserva = $reserva->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Información sobre su transporte')
                    ->view('correo.notificacion_transporte');
    }
}