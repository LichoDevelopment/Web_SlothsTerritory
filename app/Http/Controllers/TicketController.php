<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\ImagickEscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class TicketController extends Controller
{
    public function printTicket(Request $request)
    {
        // var i
        $i = 0;
        for ($i=0; $i < 2; $i++) { 
        
        
        $reserva = $request->reserva;

        $connector = new WindowsPrintConnector("impresoraRecepcion"); 
        $printer = new Printer($connector);

        // Imprimir el logo
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $logoPath = public_path('images/logo_1.png');
        try {
            $logo = EscposImage::load($logoPath);
            $printer->bitImageColumnFormat($logo);
        } catch (Exception $e) {
            info('Error al imprimir el logo: ' . $e->getMessage());
        }

        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->setTextSize(2, 2);
        $printer->text("Sloth's Territory\n\n");
        
        $printer->setTextSize(1, 1);
        $printer->text("\nFactura #" . $reserva['id'] . "\n");
        $printer->feed(1);

        // Detalles de la Reserva
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("Tour: " . $reserva['tour']['nombre'] . "\n");
        $printer->text("Fecha: " . $reserva['fecha_tour']['fecha'] . "\n");
        date_default_timezone_set('America/Costa_Rica');
        $printer->text("Fecha Emisión: " . date('Y-m-d H:i:s') . "\n");
        $printer->text("Horario: " . $reserva['horario']['hora'] . "\n");
        $printer->text("Cliente: " . $reserva['nombre_cliente'] . "\n");
        $printer->text("Adultos (12+): " . $reserva['cantidad_adultos'] . "\n");
        $printer->text("Niños (5-11): " . $reserva['cantidad_niños'] . "\n");
        $printer->text("Infantes (0-4): " . $reserva['cantidad_niños_gratis'] . "\n");
        $printer->text("Monto: $" . $reserva['monto_total'] . "\n");

        $printer->feed(1);

        // Agradecimiento
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("¡Gracias por tu visita!\n\n");

        

        // $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("\nhttps://slothsterritory.com/\n");
        // $printer->text("https://slothsterritory.com");

        $printer->cut();
        $printer->close();
    }



        return response()->json(['message' => 'Ticket printed successfully']);
    }
}
