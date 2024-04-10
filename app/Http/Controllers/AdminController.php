<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\EmailFactura;
use App\Models\Agencia;
use App\Models\Horario;
use App\Models\Precio;
use App\Models\Reserva;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\TryCatch;

class AdminController extends Controller
{
    public function agregarReserva()
    {
        $tours      = Tour::all();
        $horarios   = Horario::all();
        $agencias   = Agencia::orderBy('nombre', 'asc')->get();;
        $precios    = Precio::all();

        $view_data['tours']     = $tours;
        $view_data['horarios']  = $horarios;
        $view_data['agencias']  = $agencias;
        $view_data['precios']   = $precios;

        return view('admin.reservas.agregar', $view_data);
    }
    public function editarReserva($id)
    {
        $reserva    = Reserva::find($id);
        $tours      = Tour::all();
        $horarios   = Horario::all();
        $agencias   = Agencia::all();
        $precios    = Precio::all();

        $view_data['reserva']   = $reserva;
        $view_data['tours']     = $tours;
        $view_data['horarios']  = $horarios;
        $view_data['agencias']  = $agencias;
        $view_data['precios']   = $precios;

        return view('admin.reservas.editar', $view_data);
    }

    public function verReserva($id)
    {
        $query = request()->query();
        $reserva = Reserva::with('tilopayTransaction')->find($id);

        $locale = 'en';

        if ($query) {
            $lang = $query['lang'];
        }

        App::setLocale($locale);

        return view('admin.reservas.ver', compact('reserva', 'locale'));
    }
    public function agencias()
    {
        $agencas = Agencia::all();
        return view('admin.agencias', compact('agencias'));
    }
    public function tours()
    {
        $tours = Tour::all();
        $horarios = Horario::all();
        $precios = Precio::all();
        return view('admin.tours.index', compact('tours'));
    }
    public function enviarCorreo(Request $request, $id)
    {
        $reserva = Reserva::with('agencia', 'tour', 'fecha_tour', 'horario')->find($id)->toArray();

        Mail::to($request->email)->send(new EmailFactura($reserva));

        return response(['mensaje' => 'correo enviado']);
    }

    // public function consultarPagos(Request $request)
    // {
    //     try {
    //         // Configura la zona horaria a la de Costa Rica
    //         $nowInCostaRica = Carbon::now(new \DateTimeZone('America/Costa_Rica'));
    //         $dateBefore = (clone $nowInCostaRica)->subMonth(12);
    //         $dateAfter = (clone $nowInCostaRica)->addMonth(1);


    //         $response = Http::post('https://app.tilopay.com/api/v1/login', [
    //             "apiuser" => env('TILOPAY_API_USER'),
    //             "password" => env('TILOPAY_API_PASSWORD')
    //         ]);

    //         $token = $response->json()['access_token'];

    //         $pagos = Http::withHeaders([
    //             'Authorization' => 'Bearer ' . $token
    //         ])->post('https://app.tilopay.com/api/v1/consultTransactions', [
    //             'key' => '5340-8533-9419-4300-2564',
    //             'startDate' => $dateBefore->format('Y-m-d H:i:s'),
    //             'endDate' => $dateAfter->format('Y-m-d H:i:s'),
    //             'environment' => 0,
    //             'onlyAproved' => 1,
    //             'email' => $request->email
    //         ]);


    //         return view('admin.pagos.index', ['pagos' => $pagos->json()]);
    //     } catch (\Throwable $th) {
    //         return  response(['mensaje' => 'error'], 500);
    //     }
    // }

    public function consultarPagos(Request $request)
    {
        // Inicializa una variable para los pagos como colección vacía o null
        $pagos = collect([]);

        // Verifica si se ha recibido un correo electrónico en la solicitud
        if ($request->has('email') && !empty($request->email)) {
            try {
                // Configura la zona horaria a la de Costa Rica
                $nowInCostaRica = Carbon::now(new \DateTimeZone('America/Costa_Rica'));
                $dateBefore = (clone $nowInCostaRica)->subMonth(12);
                $dateAfter = (clone $nowInCostaRica)->addMonth(1);

                $response = Http::post('https://app.tilopay.com/api/v1/login', [
                    "apiuser" => env('TILOPAY_API_USER'),
                    "password" => env('TILOPAY_API_PASSWORD')
                ]);

                $token = $response->json()['access_token'];

                // Realiza la consulta de pagos solo si se proporcionó un correo
                $pagos = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->post('https://app.tilopay.com/api/v1/consultTransactions', [
                    'key' => '5340-8533-9419-4300-2564',
                    'startDate' => $dateBefore->format('Y-m-d H:i:s'),
                    'endDate' => $dateAfter->format('Y-m-d H:i:s'),
                    'environment' => 0,
                    'onlyAproved' => 1,
                    'email' => $request->email
                ])->json()['response'];


            } catch (\Throwable $th) {
                // En caso de error, puedes decidir qué hacer, por ejemplo, loggear el error o enviar una respuesta específica
                return response(['mensaje' => 'Ocurrió un error al consultar los pagos'], 500);
            }
        }
        // dd($pagos);

        // Retorna la vista con los pagos encontrados o vacía si no se proporcionó correo
        return view('admin.pagos.index', ['pagos' => $pagos]);
    }
}
