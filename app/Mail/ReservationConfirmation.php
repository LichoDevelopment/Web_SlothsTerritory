<?php

namespace App\Mail;

use App\Models\Reserva;
use App\Models\TilopayTransaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $paymentStatus;

    public function __construct(TilopayTransaction $data, $paymentStatus)
    {
        $this->data = $data;
        $this->paymentStatus = $paymentStatus;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correo.reservation_confirmation')
            ->with([
                'reservation' => $this->data,
                'paymentStatus' => $this->paymentStatus
            ])
            ->subject('Reservation Confirmed - Sloths Territory')
            ->cc('info@slothsterritory.com');
    }
}
