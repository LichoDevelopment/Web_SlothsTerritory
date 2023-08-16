<?php 

// info('3. Llego al inicio del script de impresión');
require __DIR__ . '/../vendor/autoload.php';

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

$reserva = $_POST;


$connector = new WindowsPrintConnector("impresoraRecepcion");  // Cambia 'ThermalPrinter' al nombre que pusiste en el paso 1
$printer = new Printer($connector);

// Logo - necesitas convertir tu imagen a un formato que la impresora pueda entender.
// Por ahora, omitiremos el logo.

// Cabecera
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->setTextSize(2, 2); 
$printer->text("Sloth's Territory\n");
$printer->setTextSize(1, 1);
$printer->text("Factura #" . $reserva['id'] . "\n");
$printer->feed(1);

// Detalles de la Reserva
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->text("Tour: " . $reserva['nombre_tour'] . "\n");
$printer->text("Fecha: " . $reserva['fecha'] . "\n");
$printer->text("Horario: " . $reserva['hora'] . "\n");
$printer->text("Cliente: " . $reserva['nombre_cliente'] . "\n");
$printer->text("Adultos: " . $reserva['cantidad_adultos'] . "\n");
$printer->text("Niños: " . $reserva['cantidad_niños'] . "\n");
$printer->text("Monto: $" . $reserva['monto_total'] . "\n");
$printer->feed(1);

// Agradecimiento
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("¡Gracias por tu visita!\n");

$printer->cut();
$printer->close();