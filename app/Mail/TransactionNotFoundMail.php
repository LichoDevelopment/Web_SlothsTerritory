<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransactionNotFoundMail extends Mailable
{
    use Queueable, SerializesModels;

    public $orderNumber;
    public $email;

    public function __construct($orderNumber, $email)
    {
        $this->orderNumber = $orderNumber;
        $this->email = $email;
    }

    public function build()
    {
        return $this->view('correo.transaction_not_found')
                    ->with([
                        'orderNumber' => $this->orderNumber,
                        'email' => $this->email,
                    ]);
    }
}
