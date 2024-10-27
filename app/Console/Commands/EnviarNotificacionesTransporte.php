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
        $fechaActual = Carbon::now('America/Costa_Rica')->format('Y-m-d');
        $fechaTourModel = Fecha_tour::where('fecha', $fechaActual)->first();


        if (!$fechaTourModel) {
            $this->info('No hay fecha de tour para mañana');
            return;
        }

        $fechaTourId = $fechaTourModel->id;

        // Obtener todos los horarios
        $horarios = Horario::where('tiene_transporte', true)
        ->whereHas('reservas', function($query) use ($fechaTourId) {
            $query->where('id_fecha_tour', $fechaTourId)
                  ->whereHas('transporte', function($query) {
                      $query->where('notificacion_enviada', false);
                  });
        })
        ->get();

        foreach ($horarios as $horario) {
            // Obtener el número de horas antes para enviar la notificación
            $hoursBeforeTransport = $horario->hours_before_transport;

            // Combinar la fecha del tour y la hora del horario
            $fechaHoraTour = Carbon::parse($fechaActual . ' ' . $horario->hora, 'America/Costa_Rica');

            // Calcular la hora en la que se debe enviar la notificación
            $horaEnvioNotificacion = $fechaHoraTour->copy()->subHours($hoursBeforeTransport);

            // Calcular la diferencia en minutos entre la hora actual y la hora del tour
            $diferenciaMinutos = Carbon::now('America/Costa_Rica')->diffInMinutes($fechaHoraTour, false);

            // Si es hora de enviar la notificación
            if (Carbon::now('America/Costa_Rica')->greaterThanOrEqualTo($horaEnvioNotificacion)) {
                $this->procesarReservasHorario($fechaTourId, $horario);
            }
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
            if (isset($pickUpTimes[$reserva->id])) {
                // Verificar si ya se envió la notificación
                if ($reserva->transporte->notificacion_enviada) {
                    continue;
                }

                $arrivalTime = $pickUpTimes[$reserva->id]->format('H:i');

                // Obtener el correo electrónico del cliente
                $tilopayTransaction = $reserva->tilopayTransaction;
                $clienteEmail = $tilopayTransaction->billToEmail;
                $nombreCliente = $reserva->nombre_cliente;

                try {
                    // Envío de correo al cliente
                    Mail::to($clienteEmail)
                        ->cc('info@slothsterritory.com')
                        ->send(new NotificacionTransporte($reserva, $arrivalTime));
                
                    // Envío de correo de monitoreo
                    Mail::to('uli.rp1999@gmail.com')
                        ->send(new NotificacionTransporte($reserva, $arrivalTime));
                
                    // Actualizar datos de transporte
                    $reserva->transporte->hora_estimada_llegada = $pickUpTimes[$reserva->id]->format('H:i:s');
                    $reserva->transporte->notificacion_enviada = true;
                    $reserva->transporte->save();
                } catch (\Exception $e) {
                    // Registrar el error
                    Log::error("Error al enviar notificación de transporte: " . $e->getMessage());
                }
            }
        }
    }
}
