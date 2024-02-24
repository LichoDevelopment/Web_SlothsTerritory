<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentValidationRequest;
use App\Models\Agencia;
use App\Models\Fecha_tour;
use App\Models\Precio;
use App\Models\Reserva;
use App\Models\TilopayTransaction;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class PaymentController extends Controller
{


    public function processPayment(PaymentValidationRequest $request)
    {

        $token = $this->getToken();

        if (!$token) {
            return response()->json(['error' => 'No se pudo obtener el token de TiloPay'], 500);
        }

        $agencia = Agencia::where('nombre', 'WEB')->first();

        // get all results Price where id_agencia = $agencia->id 
        $precios = Precio::where('id_agencia', $agencia->id)->where('id_tour', $request->tour_id)->get();

        if (!$precios) {
            return response()->json(['error' => 'No se pudo obtener el precio del tour'], 500);
        }

        $fechaTourRequest = Carbon::createFromFormat('Y-m-d', $request->date);

        $cambioPrecioFecha = Carbon::create(2023, 12, 15);

        // Verificar si la fecha del tour es antes del 15 de diciembre de 2023
        if ($fechaTourRequest->lessThan($cambioPrecioFecha) && $request->tour_id == 1) {
            // Usar precios especiales antes del 15 de diciembre de 2023
            $adultPrice = 35;
            $childPrice = 28;
        } else {
            // Usar los precios normales
            $adultPrice = $precios[0]->precio_adulto;
            $childPrice = $precios[0]->precio_niño;
        }

        // Precios (obtener estos valores de manera segura, por ejemplo, desde la DB)
        // $adultPrice = $precios[0]->precio_adulto;
        // $childPrice = $precios[0]->precio_niño;

        // Cantidad de adultos y niños
        $numAdults = $request->input('adults');
        $numChildren = $request->input('children');

        // Calculo de totales
        $totalAdults = $numAdults * $adultPrice;
        $totalChildren = $numChildren * $childPrice;
        $subtotal = $totalAdults + $totalChildren;

        // Impuestos y tarifas
        $taxesAndFeesPercentage = 0.085; // 8.5%
        $transactionFee = 0.40; // tarifa fija

        // Total con impuestos
        $totalWithTaxes = round($subtotal * (1 + $taxesAndFeesPercentage) + $transactionFee, 2);

        $commission_Tilopay_amount = $totalWithTaxes * 0.0425 + 0.35;
        $commission_system_amount = ($taxesAndFeesPercentage - 0.0425) * $totalWithTaxes;

        // Obtener la API Key de tus variables de entorno
        $apiKey = env('TILOPAY_API_KEY');

        try {
            // Preparar los datos para la solicitud
            $paymentData = array_merge($request->all(), [ //PENDIENTE PERZONALIZAR EL REQUEST
                'key' => $apiKey, // Añadir la API key a los datos del request
            ]);

            // Find Agency with name 'WEB'
            $agencia = Agencia::where('nombre', 'WEB')->first();

            //fechatour
            $fecha_tour = Fecha_tour::where('fecha', $request->date)->first();
            if (!$fecha_tour) {
                $fecha_tour = Fecha_tour::create(['fecha' => $request->date]);
            }

            // Add Reseration
            $reservation = new Reserva();
            $reservation->id_agencia = $agencia->id;
            $reservation->id_tour = $request->tour_id;
            $reservation->id_fecha_tour = $fecha_tour->id;
            $reservation->id_horario = $request->schedule_id;
            $reservation->nombre_cliente = $request->billToFirstName . ' ' . $request->billToLastName;
            $reservation->cantidad_adultos = $request->adults;
            $reservation->cantidad_niños = $request->children;
            $reservation->monto_total = $totalWithTaxes;
            $reservation->monto_con_descuento = 0;
            $reservation->comision_agencia = 0;
            $reservation->monto_neto = $subtotal;

            $reservation->save();

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
            $tilopay_transaction->billToAddress = $request->billToAddress;
            $tilopay_transaction->billToAddress2 = $request->billToAddress2;
            $tilopay_transaction->billToCity = $request->billToCity;
            $tilopay_transaction->billToState = $request->billToState;
            $tilopay_transaction->billToZipPostCode = $request->billToZipPostCode;
            $tilopay_transaction->billToCountry = $request->billToCountry;
            $tilopay_transaction->billToTelephone = $request->billToTelephone;
            $tilopay_transaction->billToEmail = $request->billToEmail;
            $tilopay_transaction->orderNumber = $reservation->id;
            $tilopay_transaction->capture = "1";
            $tilopay_transaction->subscription = "0";
            $tilopay_transaction->platform = 'api';

            $tilopay_transaction->save();

            $paymentData['redirect'] = 'https://slothsterritory.com/payment-response?hash=' . $hash;
            $paymentData['currency'] = 'USD';
            $paymentData['orderNumber'] = $reservation->id;
            $paymentData['capture'] = "1";
            $paymentData['subscription'] = "0";
            $paymentData['platform'] = 'api';
            $paymentData['amount'] = $reservation->monto_total;

            // Hacer la solicitud a TiloPay
            $client = new Client();
            $response = $client->post('https://app.tilopay.com/api/v1/processPayment', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ],
                'json' => $paymentData
            ]);

            $responseBody = json_decode($response->getBody()->getContents(), true);
            $redirectUrl = $responseBody['url']; // Esto obtiene la URL de redirección

            return response()->json(['redirectUrl' => $redirectUrl]);
        } catch (RequestException $e) {
            // Manejar errores específicos de la solicitud HTTP
            info('error payment', $e->getMessage());
            return response()->json([
                'error' => 'Error en la solicitud de pago.',
                'message' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            // Manejar otros tipos de errores generales
            return response()->json([
                'error' => 'Error interno del servidor.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    private function getToken()
    {
        $client = new Client();

        try {
            $response = $client->post('https://app.tilopay.com/api/v1/login', [
                'json' => [
                    'apiuser' => env('TILOPAY_API_USER'),
                    'password' => env('TILOPAY_API_PASSWORD')
                ]
            ]);

            $data = json_decode($response->getBody(), true);
            return $data['access_token'] ?? null;
        } catch (RequestException $e) {
            return 'Error al obtener el token de TiloPay.';
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

        // Usar los precios normales
        $adultPrice = $precios[0]->precio_adulto;
        $childPrice = $precios[0]->precio_niño;


        // Cantidad de adultos y niños
        $numAdults = $request->input('adults');
        $numChildren = $request->input('children');
        $numChildrenFree = $request->input('childrenFree');

        // Calculo de totales
        $totalAdults = $numAdults * $adultPrice;
        $totalChildren = $numChildren * $childPrice;
        $subtotal = $totalAdults + $totalChildren;

        // Impuestos y tarifas
        $taxesAndFeesPercentage = 0.085; // 8.5%
        $transactionFee = 0.40; // tarifa fija

        // Total con impuestos
        $totalWithTaxes = round($subtotal * (1 + $taxesAndFeesPercentage) + $transactionFee, 2);

        $commission_Tilopay_amount = $totalWithTaxes * 0.035 + 0.35;
        $commission_system_amount = ($subtotal * 0.05);

        try {

            //fechatour
            $fecha_tour = Fecha_tour::where('fecha', $request->date)->first();
            if (!$fecha_tour) {
                $fecha_tour = Fecha_tour::create(['fecha' => $request->date]);
            }

            // Add Reseration
            $reservation = new Reserva();
            $reservation->id_agencia = $agencia->id;
            $reservation->id_tour = $request->tour_id;
            $reservation->id_fecha_tour = $fecha_tour->id;
            $reservation->id_horario = $request->schedule_id;
            $reservation->nombre_cliente = $request->billToFirstName . ' ' . $request->billToLastName;
            $reservation->cantidad_adultos = $request->adults;
            $reservation->cantidad_niños = $request->children;
            $reservation->cantidad_niños_gratis = $request->childrenFree;
            $reservation->monto_total = $totalWithTaxes;
            $reservation->monto_con_descuento = 0;
            $reservation->comision_agencia = 0;
            $reservation->monto_neto = $subtotal;

            $reservation->save();

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
            return response()->json([
                'error' => 'Error interno del servidor.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
