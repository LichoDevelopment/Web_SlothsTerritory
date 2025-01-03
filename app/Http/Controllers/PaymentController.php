<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentValidationRequest;
use App\Mail\TransportReservationNotification;
use App\Models\Agencia;
use App\Models\ConfiguracionTransporte;
use App\Models\Fecha_tour;
use App\Models\Precio;
use App\Models\Reserva;
use App\Models\TiloPayLink;
use App\Models\TilopayTransaction;
use App\Models\Transporte;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{

    private function calculateTranportCost($distance, $pricePerKm, $minimumDistance, $minimumPrice, $maximunDistance)
    {
        $cost = 0;
        if ($distance < $minimumDistance) {
            $cost = $minimumPrice;
        } else if ($distance > $maximunDistance) {
            $cost = 0;
        } else {
            $intMinimumDistance = intval($minimumDistance);
            $floatMinimunPrice = floatval($minimumPrice);
            $floatPricePerKm = floatval($pricePerKm);
            $intDistance = intval($distance);
            $cost = $floatMinimunPrice + ($intDistance - $intMinimumDistance) * $floatPricePerKm;
        }
        return $cost;
    }

    public function getTotalPersonasTransporte($fecha_tour_id, $horario_id)
    {
        $totalPersonas = Reserva::where('id_fecha_tour', $fecha_tour_id)
            ->where('id_horario', $horario_id)
            ->whereHas('transporte') // Asegura que sólo considera reservas con transporte
            ->get()
            ->sum(function ($reserva) {
                return $reserva->cantidad_adultos + $reserva->cantidad_niños + $reserva->cantidad_niños_gratis;
            });

        return $totalPersonas;
    }

    private function getToken()
    {
        $client = new \GuzzleHttp\Client();
        $headers = [
            'Content-Type' => 'application/json',
        ];

        // Obtener los valores desde el archivo .env
        $apiUser = env('TILOPAY_API_USER');    // Define en tu .env TILOPAY_API_USER=qK4vZI
        $password = env('TILOPAY_API_PASSWORD'); // Define en tu .env TILOPAY_API_PASSWORD=3MtPYD
        $loginUrl = env('TILOPAY_LOGIN_URL'); // URL del endpoint

        // Preparar el cuerpo de la petición
        $body = [
            'apiuser' => $apiUser,
            'password' => $password,
        ];

        // Realizar la petición
        try {
            $response = $client->post($loginUrl, [
                'headers' => $headers,
                'json' => $body, // Usamos el array directamente para que Guzzle lo maneje como JSON
            ]);

            $data = json_decode($response->getBody(), true);

            // Validar que el token exista en la respuesta
            if (isset($data['access_token'])) {
                return $data;
            }

            throw new \Exception('No se pudo obtener el token de TiloPay');
        } catch (\Exception $e) {
            info('Error obteniendo el token: ' . $e->getMessage());
            return null;
        }
    }

    public function getTokenTilopay(Request $request)
    {
        $client = new Client();

        $apiuser = $request->input('apiUser');
        $apiPassword = $request->input('apiPassword');
        $apiKey = $request->input('apiKey');

        try {
            $response = $client->post('https://app.tilopay.com/api/v1/loginSdk', [
                'json' => [
                    'apiuser' => $apiuser,
                    'password' => $apiPassword,
                    'key' => $apiKey
                ]
            ]);

            $data = json_decode($response->getBody(), true);
            return response()->json(['access_token' => $data['access_token']]);
        } catch (RequestException $e) {
            return response()->json(['error' => 'Error al obtener el token de TiloPay.'], 500);
        }
    }

    public function processPaymentSDK(PaymentValidationRequest $request)
    {
        $agencia = Agencia::where('nombre', 'WEB')->first();

        // get all results Price where id_agencia = $agencia->id 
        $precios = Precio::where('id_agencia', $agencia->id)->where('id_tour', $request->tour_id)->get();

        if (!$precios) {
            return response()->json(['error' => 'No se pudo obtener el precio del tour'], 500);
        }

        // info('request'. $request);

        if ($request->schedule_id == 16) {
            $adultPrice = 60;
            $childPrice = 35;
        } else {
            // Usar los precios normales
            $adultPrice = $precios[0]->precio_adulto;
            $childPrice = $precios[0]->precio_niño;
        }


        // Cantidad de adultos y niños
        $numAdults = $request->input('adults');
        $numChildren = $request->input('children');
        $numChildrenFree = $request->input('childrenFree');

        // Calculo de totales
        $totalAdults = $numAdults * $adultPrice;
        $totalChildren = $numChildren * $childPrice;

        // Impuestos y tarifas
        $taxesAndFeesPercentage = 0.085; // 8.5%
        $transactionFee = 0.40; // tarifa fija

        // Total con impuestos
        $subtotal = $totalAdults + $totalChildren;
        $totalWithTaxes = round($subtotal * (1 + $taxesAndFeesPercentage) + $transactionFee, 2);

        $commission_Tilopay_amount = $totalWithTaxes * 0.035 + 0.35;
        $commission_system_amount = ($subtotal * 0.05);

        try {

            //fechatour
            $fecha_tour = Fecha_tour::where('fecha', $request->date)->first();
            if (!$fecha_tour) {
                $fecha_tour = Fecha_tour::create(['fecha' => $request->date]);
            }

            $configuracionTransporte = ConfiguracionTransporte::first();

            // Add Reseration
            $reservation = new Reserva();
            $reservation->id_agencia = $agencia->id;
            $reservation->id_tour = $request->tour_id;
            $reservation->id_fecha_tour = $fecha_tour->id;
            $reservation->id_horario = $request->schedule_id;
            $reservation->nombre_cliente = $request->billToFirstName . ' ' . $request->billToLastName;
            $reservation->email = $request->billToEmail;
            $reservation->cantidad_adultos = $request->adults;
            $reservation->cantidad_niños = $request->children;
            $reservation->cantidad_niños_gratis = $request->childrenFree;
            $reservation->monto_total = $totalWithTaxes;
            $reservation->monto_con_descuento = 0;
            $reservation->comision_agencia = 0;
            $reservation->monto_neto = $subtotal;

            // Add transport
            if ($request->needTransport) {

                $totalPersonasTransporte = $this->getTotalPersonasTransporte($fecha_tour->id, $request->schedule_id);
                $totalPersonasReserva = $reservation->cantidad_adultos + $reservation->cantidad_niños + $reservation->cantidad_niños_gratis;
                if ($totalPersonasTransporte + $totalPersonasReserva > $configuracionTransporte->cantidad_maxima_pasajeros) {
                    return response()->json(['error' => 'La cantidad de personas excede la capacidad máxima de pasajeros.'], 400);
                }

                $precioMinimo = $configuracionTransporte->precio_minimo;
                $distanciaMaxima = $configuracionTransporte->distancia_maxima;
                $distanciaMinima = $configuracionTransporte->distancia_minima;
                $precioPorKmAdicional = $configuracionTransporte->precio_por_km_adicional;

                $cost = $this->calculateTranportCost(
                    $request->distance,
                    $precioPorKmAdicional,
                    $distanciaMinima,
                    $precioMinimo,
                    $distanciaMaxima
                );

                $cost = $cost * ($reservation->cantidad_adultos + $reservation->cantidad_niños + $reservation->cantidad_niños_gratis);

                // Total con impuestos
                $subtotal = $totalAdults + $totalChildren + $cost;
                $totalWithTaxes = round($subtotal * (1 + $taxesAndFeesPercentage) + $transactionFee, 2);

                $reservation->monto_total = $totalWithTaxes;
                $reservation->monto_neto = $subtotal;
                $reservation->save();

                if ($cost !== 0) {
                    $transport = new Transporte();
                    $transport->reserva_id = $reservation->id;
                    $transport->punto_recogida = $request->placeSelected;
                    $transport->direccion = $request->placeSelected["direccion"];
                    $transport->placeId = $request->placeSelected["placeId"];
                    $transport->latitud = $request->placeSelected["ubicacion"]["lat"];
                    $transport->longitud = $request->placeSelected["ubicacion"]["lng"];
                    $transport->costo = $cost;
                    $transport->distancia = $request->distance;
                    $transport->save();

                    try {
                        // send notification
                        Mail::to('uli.rp1999@gmail.com')
                            ->cc('keilor1997@icloud.com')
                            ->send(new TransportReservationNotification($reservation, $transport));
                    } catch (\Exception $e) {
                        \Log::error('Error al enviar el correo de notificación: ' . $e->getMessage());
                    }
                }
            } else {
                $reservation->save();
            }

            $hash = md5($reservation->id);
            $tilopay_transaction = new TilopayTransaction();
            $tilopay_transaction->reserva_id = $reservation->id;
            $tilopay_transaction->hashKey = $hash;
            $tilopay_transaction->order_hash = null;
            $tilopay_transaction->transaction_code = null;
            $tilopay_transaction->transaction_status = "PENDIENTE";
            $tilopay_transaction->auth_code = null;
            $tilopay_transaction->amount = $reservation->monto_total;
            $tilopay_transaction->commission_Tilopay_amount = $commission_Tilopay_amount; //CALCULAR 4.25% + 0.35 dolares
            $tilopay_transaction->commission_system_amount = $commission_system_amount; //CALCULAR 8.5% - 4.25%
            $tilopay_transaction->currency = 'USD';
            $tilopay_transaction->billToFirstName = $request->billToFirstName;
            $tilopay_transaction->billToLastName = $request->billToLastName;
            $tilopay_transaction->billToCountry = $request->billToCountry;
            $tilopay_transaction->billToTelephone = $request->billToTelephone;
            $tilopay_transaction->billToEmail = $request->billToEmail;
            $tilopay_transaction->orderNumber = $request->orderNumber;
            $tilopay_transaction->capture = "1";
            $tilopay_transaction->subscription = "0";
            $tilopay_transaction->platform = 'sdk';
            $tilopay_transaction->billToAddress = 'N/A';
            $tilopay_transaction->billToAddress2 = 'N/A';
            $tilopay_transaction->billToCity = 'N/A';
            $tilopay_transaction->billToState = 'N/A';
            $tilopay_transaction->billToZipPostCode = 'N/A';

            $tilopay_transaction->save();

            return response()->json(['hash' => $hash]);
        } catch (RequestException $e) {
            // Manejar errores específicos de la solicitud HTTP
            info('error payment', $e->getMessage());
            return response()->json([
                'error' => 'Error al guardar la reserva',
                'message' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            // Manejar otros tipos de errores generales
            info('error payment', $e->getMessage());
            return response()->json([
                'error' => 'Error interno del servidor.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getTokenTilopayInternal()
    {
        try {
            $client = new Client();
            $response = $client->post('https://app.tilopay.com/api/v1/loginSdk', [
                'json' => [
                    'apiuser' => env('TILOPAY_API_USER'),
                    'password' => env('TILOPAY_API_PASSWORD'),
                    'key' => env('TILOPAY_API_KEY'),
                ]
            ]);
            // Decodificar el cuerpo de la respuesta
            $data = json_decode($response->getBody(), true);

            // Retornar el token directamente
            return $data['access_token'];
        } catch (RequestException $e) {
            \Log::error('Error al obtener token TiloPay: ' . $e->getMessage());
            return null;
        }
    }

    public function ajaxGeneratePaymentLink(Request $request)
    {
        try {
            // 1. Recibimos la reserva_id y el email (opcional).
            $reservaId = $request->input('reserva_id');
            $email = $request->input('email');

            // 2. Buscar la reserva
            $reserva = Reserva::findOrFail($reservaId);

            // 3. Actualizamos el email si es necesario
            if (!empty($email) && (empty($reserva->email) || $reserva->email !== $email)) {
                $reserva->email = $email;
                $reserva->save();
            }

            // 4. Obtener el token de TiloPay
            $tokenData = $this->getToken();
            if (!isset($tokenData['access_token'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se pudo obtener el token de TiloPay',
                ], 500);
            }
            $accessToken = $tokenData['access_token'];

            // Preparar los datos:
            // Impuestos y tarifas
            $taxesAndFeesPercentage = 0.085; // 8.5%
            $transactionFee = 0.40; // tarifa fija
            $total = $reserva->monto_total;

            $totalWithTaxes = round($total * (1 + $taxesAndFeesPercentage) + $transactionFee, 2);
            // $totalWithTaxes = round($total, 2);

            // 5. Preparar datos para la petición
            $headers = [
                'Authorization' => "bearer $accessToken",
                'Content-Type'  => 'application/json',
            ];
            $body = [
                "key"         => env('TILOPAY_API_KEY'),  // Clave desde el archivo .env
                "amount"      => $totalWithTaxes, // Formato decimal
                "currency"    => "USD",
                "reference"   => (string) $reserva->id,  // Referencia única de la reserva
                "type"        => 1,                      // Limitado
                "description" => "Pago de reserva #{$reserva->id}",
                "client"      => $reserva->nombre_cliente ?? '',
                "callback_url" => "",                   // Puedes agregar tu callback aquí
            ];

            // 6. Realizar la petición a TiloPay
            $client = new \GuzzleHttp\Client();
            $response = $client->post('https://app.tilopay.com/api/v1/createLinkPayment', [
                'headers' => $headers,
                'json'    => $body,
            ]);

            $responseData = json_decode($response->getBody(), true);

            // 7. Validar respuesta y devolver resultado
            if (!isset($responseData['url'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se recibió la URL de TiloPay',
                ], 500);
            }

            // Opcional: Guardar enlace en la base de datos
            TiloPayLink::create([
                'reserva_id'  => $reserva->id,
                'tilopay_id'  => $responseData['id'],
                'url'         => $responseData['url'],
                'currency'    => "USD",
                'amount'      => $body['amount'],
                'reference'   => $body['reference'],
                'type'        => $body['type'],
                'description' => $body['description'],
                'client'      => $body['client'],
                'callback_url' => $body['callback_url'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Link de pago creado con éxito',
                'url'     => $responseData['url'],
                'id'      => $responseData['id'],
            ]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return response()->json([
                'error' => 'Error creando link de pago.',
                'details' => $e->getMessage(),
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error inesperado al crear el link de pago.',
                'details' => $e->getMessage(),
            ], 500);
        }
    }

    public function consultarLinks()
    {
        try {
            // Obtener el token
            $tokenData = $this->getToken();
            if (!isset($tokenData['access_token'])) {
                return redirect()->back()->with('error', 'No se pudo obtener el token de TiloPay.');
            }
            $accessToken = $tokenData['access_token'];

            $client = new \GuzzleHttp\Client();
            $headers = [
                'Authorization' => 'bearer ' . $accessToken,
            ];

            // Obtener solo los links con estado pending
            $links = TiloPayLink::where('payment_status', 'pending')->get();

            foreach ($links as $link) {
                try {
                    // Consultar detalle del link en TiloPay
                    $response = $client->get("https://app.tilopay.com/api/v1/getDetailLinkPayment/{$link->tilopay_id}/" . env('TILOPAY_API_KEY'), [
                        'headers' => $headers,
                    ]);

                    $responseData = json_decode($response->getBody(), true);

                    if ($responseData['type'] === "200") {
                        $payments = $responseData['payments'] ?? [];

                        // Actualizar el estado del link según el resultado de la consulta
                        if (!empty($payments)) {
                            $link->payment_status = 'paid';
                        } else {
                            $link->payment_status = 'pending';
                        }
                        $link->save();
                    }
                } catch (\Exception $e) {
                    // Loggear errores por cada link fallido pero continuar con el resto
                    info("Error consultando link con ID {$link->tilopay_id}: " . $e->getMessage());
                }
            }

            // Obtener todos los links con su información actualizada y relaciones
            $links = TiloPayLink::with('reserva')->get();

            return view('admin.links.links-tilopay', compact('links'));
        } catch (\Exception $e) {
            info('Error consultando links de TiloPay: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al consultar links de TiloPay.');
        }
    }
}
