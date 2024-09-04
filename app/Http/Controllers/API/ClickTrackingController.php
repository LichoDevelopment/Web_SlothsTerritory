<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClickNotificationMail;

class ClickTrackingController extends Controller
{
    public function trackClick(Request $request)
    {
        Mail::to('uli.rp1999@gmail.com')->send(new ClickNotificationMail());
        return response()->json(['message' => 'Email sent!']);
    }
}
