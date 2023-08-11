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
        
        // info('TicketController:printTicket');
        // info($request->reserva);

        $reserva = $request->reserva;

        $connector = new WindowsPrintConnector("POS-80C"); 
        $printer = new Printer($connector);

        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->setTextSize(2, 2);
        $printer->text("Sloth's Territory\n");
        $printer->setTextSize(1, 1);
        $printer->text("Factura #" . $reserva['id'] . "\n");
        $printer->feed(1);

        // Detalles de la Reserva
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("Tour: " . $reserva['tour']['nombre'] . "\n");
        $printer->text("Fecha: " . $reserva['fecha_tour']['fecha'] . "\n");
        $printer->text("Horario: " . $reserva['horario']['hora'] . "\n");
        $printer->text("Cliente: " . $reserva['nombre_cliente'] . "\n");
        $printer->text("Adultos: " . $reserva['cantidad_adultos'] . "\n");
        $printer->text("Niños: " . $reserva['cantidad_niños'] . "\n");
        $printer->text("Monto: $" . $reserva['monto_total'] . "\n");
        $printer->feed(1);

        // Agradecimiento
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("¡Gracias por tu visita!\n\n");

        // Imprimir el logo
        $logoPath = public_path('images/logo_1.png');
        try {
            $logo = EscposImage::load($logoPath);
            $printer->bitImageColumnFormat($logo);
        } catch (Exception $e) {
            info('Error al imprimir el logo: ' . $e->getMessage());
        }

        // $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("\nhttps://slothsterritory.com/\n");
        // $printer->text("https://slothsterritory.com");

        $printer->cut();
        $printer->close();


        return response()->json(['message' => 'Ticket printed successfully']);
    }
}
