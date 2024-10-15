<?php

namespace App\Console\Commands;

use App\Mail\NotificacionTransporte;
use App\Models\Fecha_tour;
use App\Models\Horario;
use App\Models\Reserva;
use App\Traits\CalculaRutasTrait;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EnviarNotificacionesTransporte extends Command
{

    use CalculaRutasTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transporte:enviar-notificaciones';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía notificaciones a los clientes con la hora estimada de recogida';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fechaTour = Carbon::now()->format('Y-m-d');
        $fechaTourModel = Fecha_tour::where('fecha', $fechaTour)->first();

        if (!$fechaTourModel) {
            $this->info('No hay fecha de tour para mañana');
            return;
        }

        $fechaTourId = $fechaTourModel->id;
        $horarioId = 4; // ID del horario específico (e.g., 4 para las 9:00 am)

        // Llamar al método calculateRouteAndTimes
        $routeData = $this->calculateRouteAndTimes($fechaTourId, $horarioId);


        if (!$routeData) {
            $this->info('No hay reservas con transporte para mañana');
            return;
        }


        $driverDepartureTime = $routeData['driver_departure_time'];
        $pickUpTimes = $routeData['pick_up_times'];
        $optimizedReservations = $routeData['optimized_reservations'];
        $routeLink = $routeData['route_link'];

        
        // Aquí puedes enviar el enlace de la ruta al conductor si lo deseas
        // Por ejemplo, enviar un correo al conductor con el enlace y la hora de salida
        // ???


        // Enviar notificaciones y actualizar la hora estimada en transporte
        foreach ($optimizedReservations as $reserva) {
            if (isset($pickUpTimes[$reserva->id])) {
                $arrivalTime = $pickUpTimes[$reserva->id]->format('H:i');

                // Obtener el correo electrónico del cliente
                $tilopayTransaction = $reserva->tilopayTransaction;
                $clienteEmail = $tilopayTransaction->billToEmail;
                $clienteEmail = 'uli.rp1999@gmail.com';
                $nombreCliente = $reserva->nombre_cliente;

                // Enviar notificación por correo
                Mail::to($clienteEmail)->send(new NotificacionTransporte($reserva, $arrivalTime));

                // Actualizar la hora estimada en la tabla transporte
                $reserva->transporte->hora_estimada_llegada = $pickUpTimes[$reserva->id]->format('H:i:s');
                $reserva->transporte->save();
            }
        }

    }
}
