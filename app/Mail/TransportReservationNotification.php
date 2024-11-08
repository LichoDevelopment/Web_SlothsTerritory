<?php

namespace App\Mail;

use App\Models\Reserva;
use App\Models\Transporte;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransportReservationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    public $transport;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reserva $reservation, Transporte $transport)
    {
        $this->reservation = $reservation;
        $this->transport = $transport;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->subject('Nueva reserva con transporte')
            ->view('correo.transport_reservation_notification');
    }
}
