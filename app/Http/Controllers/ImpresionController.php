<?php

namespace App\Http\Controllers;

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImpresionController extends Controller
{
    public function imprimirTicket(Request $request)
    {
        return view('admin.reservas.print_ticket');
    }
}
