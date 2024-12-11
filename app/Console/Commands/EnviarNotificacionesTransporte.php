<?php

namespace App\Console\Commands;

use App\Mail\NotificacionTransporte;
use App\Models\Fecha_tour;
use App\Models\Horario;
use App\Models\Reserva;
use App\Traits\CalculaRutasTrait;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
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
        $now = Carbon::now('America/Costa_Rica');

        // Obtener todas las reservas con transporte pendiente de notificación
        $reservas = Reserva::whereHas('transporte', function ($query) {
            $query->where('notificacion_enviada', false);
        })->get();

        info('Reservas pendientes de notificación: ' . $reservas->count());

        foreach ($reservas as $reserva) {
            $horario = $reserva->horario;
            $fechaTour = $reserva->fecha_tour->fecha;
            $hoursBeforeTransport = $horario->hours_before_transport;

            // Combinar la fecha del tour y la hora del horario
            $fechaHoraTour = Carbon::parse($fechaTour . ' ' . $horario->hora, 'America/Costa_Rica');

            // Calcular la hora en la que se debe enviar la notificación
            $horaEnvioNotificacion = $fechaHoraTour->copy()->subHours($hoursBeforeTransport);

            // Si es hora de enviar la notificación
            // if ($now->greaterThanOrEqualTo($horaEnvioNotificacion)) {
            info('Procesando reserva: ' . $reserva->id);
            $this->procesarReservasHorario($reserva->id_fecha_tour, $horario);
            // }
        }
    }

    private function procesarReservasHorario($fechaTourId, $horario)
    {
        // Llamar al método calculateRouteAndTimes
        $routeData = $this->calculateRouteAndTimes($fechaTourId, $horario->id);

        if (!$routeData) {
            $this->info("No hay reservas con transporte para el horario {$horario->hora}");
            return;
        }

        $driverDepartureTime = $routeData['driver_departure_time'];
        $pickUpTimes = $routeData['pick_up_times'];
        $optimizedReservations = $routeData['optimized_reservations'];
        $routeLink = $routeData['route_link'];

        // Aquí puedes enviar el enlace de la ruta al conductor si lo deseas
        // Por ejemplo, enviar un correo al conductor con el enlace y la hora de salida

        // Enviar notificaciones y actualizar la hora estimada en transporte
        foreach ($optimizedReservations as $reserva) {
            if ($reserva->id_agencia == 163) { // Agencia usada para bloquear
                continue;
            }

            if (isset($pickUpTimes[$reserva->id])) {
                // Verificar si ya se envió la notificación
                // if ($reserva->transporte->notificacion_enviada) {
                //     continue;
                // }

                $arrivalTime = $pickUpTimes[$reserva->id]->format('H:i');
                $oldArrivalTime = $reserva->transporte->hora_estimada_llegada;

                try {
                    // Obtener el email del cliente
                    $tilopayTransaction = $reserva->tilopayTransaction;
                    $nombreCliente = $reserva->nombre_cliente;
                    $clienteEmail = ($tilopayTransaction && !empty($tilopayTransaction->billToEmail))
                        ? $tilopayTransaction->billToEmail
                        : $reserva->email;
                } catch (\Exception $e) {
                    $clienteEmail = 'info@slothsterritory.com';
                }

                if (!$reserva->transporte->notificacion_enviada) {
                    // Primera notificacións
                    Mail::to($clienteEmail)
                        ->cc('info@slothsterritory.com')
                        ->send(new NotificacionTransporte($reserva, $arrivalTime));

                    //     // Envío de correo de monitoreo
                    Mail::to('uli.rp1999@gmail.com')
                    ->cc('keilor1997@icloud.com')
                    ->send(new NotificacionTransporte($reserva, $arrivalTime));

                    $reserva->transporte->hora_estimada_llegada = $arrivalTime . ':00';
                    $reserva->transporte->notificacion_enviada = true;
                    $reserva->transporte->save();
                } else {
                    // Ya se notificó anteriormente, verificar si la hora cambió
                    if ($oldArrivalTime && $oldArrivalTime != ($arrivalTime . ':00')) {
                        // Enviar una notificación de actualización
                        Mail::to($clienteEmail)
                            ->cc('info@slothsterritory.com')
                            ->send(new NotificacionTransporte($reserva, $arrivalTime, true)); // el true podría ser para indicar actualización

                        //     // Envío de correo de monitoreo
                        Mail::to('uli.rp1999@gmail.com')
                            ->cc('keilor1997@icloud.com')
                            ->send(new NotificacionTransporte($reserva, $arrivalTime, true));

                        // Actualizar la hora estimada
                        $reserva->transporte->hora_estimada_llegada = $arrivalTime . ':00';
                        $reserva->transporte->save();
                    }
                }

            }
        }
    }
}
