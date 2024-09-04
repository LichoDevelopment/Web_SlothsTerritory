<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClickNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->view('correo.clickNotification')
                    ->subject('New Click on Villa Booking Link');
    }
}
