<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\CustomerWebMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Mail\WebConsultingMail;
use App\Models\WebConsultingBackup;

class MailController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }
    public function send()
    {
        $validator = Validator::make($this->request->all(), [
            'clientMail' => 'required',
            'clientName' => 'required',
            'message' => 'required',
        ], [
            'required' => 'El :attribute es requerido '
        ]);
        
        if (!$validator->fails()){

            WebConsultingBackup::create([
                'client_name'   => $this->request->clientName,
                'client_mail'   => $this->request->clientMail,
                'message'       => $this->request->message,
            ]);
            
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new CustomerWebMail($this->request->message, $this->request->clientMail, $this->request->clientName));
            return response()->json([
                'error' => false,
                'message' => 'Mensaje enviado',
                'errors' => []
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Algo salió mal',
            'errors' => $validator->errors()
        ]);
    }
}
