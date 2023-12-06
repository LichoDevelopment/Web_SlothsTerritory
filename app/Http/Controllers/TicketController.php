<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Mike42\Escpos\EscposImage;
//use Mike42\Escpos\ImagickEscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector; // For Windows
use Mike42\Escpos\PrintConnectors\CupsPrintConnector; // For Linux
use Mike42\Escpos\PrintConnectors\SmbPrintConnector;
use Mike42\Escpos\Printer;

class TicketController extends Controller
{
    public function printTicket(Request $request)
    {
    //     // var i
    //     $i = 0;
    //     for ($i=0; $i < 2; $i++) { 
        
        
        $reserva = $request->reserva;

    //     $nombreImpresora = "nombre_de_tu_impresora";
    //     $nombreComputadoraWindows = "10.200.200.2";
    //     //$connector = new WindowsPrintConnector("impresoraRecepcion"); // For Windows
    //     // $connector = new CupsPrintConnector("impresoraRecepcion"); // For Linux
    //     $connector = new SmbPrintConnector($nombreComputadoraWindows, $nombreImpresora);
    //     $printer = new Printer($connector);

    //     // Imprimir el logo
    //     $printer->setJustification(Printer::JUSTIFY_CENTER);
    //     $logoPath = public_path('images/logo_1.png');
    //     try {
    //         $logo = EscposImage::load($logoPath);
    //         $printer->bitImageColumnFormat($logo);
    //     } catch (Exception $e) {
    //         info('Error al imprimir el logo: ' . $e->getMessage());
    //     }

    //     $printer->setJustification(Printer::JUSTIFY_CENTER);
    //     $printer->setTextSize(2, 2);
    //     $printer->text("Sloth's Territory\n\n");
        
    //     $printer->setTextSize(1, 1);
    //     $printer->text("\nFactura #" . $reserva['id'] . "\n");
    //     $printer->feed(1);

    //     // Detalles de la Reserva
    //     $printer->setJustification(Printer::JUSTIFY_LEFT);
    //     $printer->text("Tour: " . $reserva['tour']['nombre'] . "\n");
    //     $printer->text("Fecha: " . $reserva['fecha_tour']['fecha'] . "\n");
    //     date_default_timezone_set('America/Costa_Rica');
    //     $printer->text("Fecha Emisión: " . date('Y-m-d H:i:s') . "\n");
    //     $printer->text("Horario: " . $reserva['horario']['hora'] . "\n");
    //     $printer->text("Cliente: " . $reserva['nombre_cliente'] . "\n");
    //     $printer->text("Adultos (12+): " . $reserva['cantidad_adultos'] . "\n");
    //     $printer->text("Niños (5-11): " . $reserva['cantidad_niños'] . "\n");
    //     $printer->text("Infantes (0-4): " . $reserva['cantidad_niños_gratis'] . "\n");
    //     $printer->text("Monto: $" . $reserva['monto_total'] . "\n");

    //     $printer->feed(1);

    //     // Agradecimiento
    //     $printer->setJustification(Printer::JUSTIFY_CENTER);
    //     $printer->text("¡Gracias por tu visita!\n\n");

        

    //     // $printer->setJustification(Printer::JUSTIFY_CENTER);
    //     $printer->text("\nhttps://slothsterritory.com/\n");
    //     // $printer->text("https://slothsterritory.com");

    //     $printer->cut();
    //     $printer->close();
    // }



        // return response()->json(['message' => 'Ticket printed successfully']);

        $client = new Client();

        try {
            $response = $client->post('http://10.200.200.2:8000/print-ticket', [
                'json' => $reserva
            ]);
info("llega 2");
info($response);
    
            $responseData = json_decode($response->getBody(), true);
            if ($responseData['message'] == 'Ticket printed successfully') {
                // El ticket se imprimió correctamente.
            } else {
                // Hubo algún problema.
            }
        } catch (\Exception $e) {
            // Manejar errores de conexión, etc.
info('Error: ' . $e->getMessage());
        }
    }
}
