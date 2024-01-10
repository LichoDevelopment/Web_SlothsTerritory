<?php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirmation;
use App\Mail\TransactionNotFoundMail;
use App\Models\Agencia;
use App\Models\Estado;
use App\Models\Fecha_tour;
use App\Models\Horario;
use App\Models\Image;
use App\Models\ImageType;
use App\Models\Reserva;
use App\Models\Reservacion;
use App\Models\SiteSection;
use App\Models\TilopayTransaction;
use Carbon\CarbonTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function home($locale)
    {
        App::setLocale($locale);

        $images = Image::with('type')->get();
        // return $images;
        $imageTypes = ImageType::all();
        // return $imageTypes;
        $inicio = time();
        $siteSections = SiteSection::all()->where('language', $locale)->groupBy('title');// \'' . $locale . '\'
        // $siteSections = DB::select("SELECT JSON_OBJECT(title, content)FROM site_sections WHERE language = '$locale'");
        // $siteSections = DB::select("SELECT title, content FROM site_sections WHERE language = '$locale' group by title;");
        // return $siteSections;
        // 
        // $fin = time();
        // dd($fin - $inicio);
        // return $siteSections;
        
        return view('home', compact('locale', 'images', 'imageTypes', 'siteSections'));
    }

    public function getTransactionsTilopay() {

        // Configura la zona horaria a la de Costa Rica
        $nowInCostaRica = Carbon::now(new \DateTimeZone('America/Costa_Rica'));
        $twoDaysBefore = $nowInCostaRica->subDays(2)->startOfDay();

        $response = Http::post('https://app.tilopay.com/api/v1/login', [
            "apiuser" => env('TILOPAY_API_USER'),
            "password" => env('TILOPAY_API_PASSWORD')
        ]);

        info('response', $response->json());
        $token = $response->json()['access_token'];


        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->post('https://app.tilopay.com/api/v1/consultTransactions', [
            'key' => '5340-8533-9419-4300-2564',
            'startDate' => $twoDaysBefore->format('Y-m-d H:i:s'),
            'endDate' => $nowInCostaRica->format('Y-m-d H:i:s'),
            'environment' => 0,
            'onlyAproved' => 1,
        ]);

        return $response->json();
    }

    public function updateTransactionsTilopay() {

        $transactions = $this->getTransactionsTilopay();

        foreach ($transactions['response'] as $transaction) {
            // Limpiar el orderNumber para obtener solo la parte que necesitas
            $orderNumberParts = explode('-', $transaction['orderNumber']);
            $cleanOrderNumber = array_pop($orderNumberParts); // Obtiene el último elemento que sería el número de orden limpio
    
            // info('transactions', $transactions);
            info('transaction', $transaction);
            info('cleanOrderNumber'. $cleanOrderNumber);

            // Buscar en la base de datos por el orderNumber limpio
            $transactionOrderNumber = 'ORD-'.$cleanOrderNumber;
            info('transactionOrderNumber'. $transactionOrderNumber);
            $tilopayTransaction = TilopayTransaction::with('reserva')->where('orderNumber', $transactionOrderNumber)->first();
            if ($tilopayTransaction) {
                info('SIIIIIIIIIIIIII');
                info('tilopayTransaction'. $tilopayTransaction);
               
                
                if ($tilopayTransaction->transaction_status == 'PENDIENTE') {
                    info('22222');
                    $tilopayTransaction->transaction_status = 'SUCCESS';
                    $tilopayTransaction->save();
                    info('33333');
                }
                
                $reservation = $tilopayTransaction->reserva;
                if ($reservation) {
                    info($reservation->id);
                    info('44444');
                    if ($reservation->payment_status == 'pending') {
                        info('55555');
                        $reservation->payment_status = 'Pagado';
                        $reservation->save();
                        info('66666');
                        
                        $dataToEmail = $tilopayTransaction->load('reserva.tour', 'reserva.horario', 'reserva.fecha_tour');
                        $paymentStatus = 'Transacción exitosa';
                        Mail::to($dataToEmail->billToEmail)->send(new ReservationConfirmation($dataToEmail, $paymentStatus));
                        info('77777');
                    }
                }
            } else {

                $orderNumber = $transaction['orderNumber'];
                $transactionEmail = $transaction['email'];
                Mail::to('uli.rp1999@gmail.com')->send(new TransactionNotFoundMail($orderNumber, $transactionEmail));
            }
        }
    }

    public function admin(Request $request)
    {
        $this->updateTransactionsTilopay();

        // $startedAt = time();
        $current_date_time = Carbon::now();
            $date = $current_date_time->setTimezone('America/Costa_Rica');
            $date = $date->format('Y-m-d');
        if (rol_usuario()->id === 2){

            $reservas = DB::select('CALL filtrar_reservas(?,?,?,?)',[$date, $date, null,null]);
            $totales  = DB::select('CALL totales(?,?,?,?)',[$date, $date, null,null]);
        }
        else{
            $reservas = DB::select('CALL filtrar_reservas(?,?,?,?)',[null, null, null,null]);
            // $reservas = Reserva::all();
            $totales  = DB::select('CALL totales(?,?,?,?)',[null, null, null,null]);  
        }
        

        DB::select('CALL actualizar_estados');

        $query = $request->query();
        $fechaInicio = '';
        $fechaFin = '';
        // $reservas = Reserva::orderBy('id_fecha_tour')->orderBy('id_estado','asc')->get();
        $agencias = Agencia::orderBy('nombre')->get();
        $estados = Estado::all();
        $horarios = Horario::all();
        
        $total_adultos = '';
        $total_niños = '';
        $total_niños_gratis = '';
        $total_pax= '';

        $total_comisiones = '';          
                            
        if($query){
            if (rol_usuario()->id === 2){
                // $fechaInicio    = $date;
                // $fechaFin       = $date;
                $fechaInicio    = isset($query['fechaInicio']) ? $query['fechaInicio'] : null;
                $fechaFin       = isset($query['fechaFin']) ? $query['fechaFin'] : null;
            }
            else{
                $fechaInicio    = isset($query['fechaInicio']) ? $query['fechaInicio'] : null;
                $fechaFin       = isset($query['fechaFin']) ? $query['fechaFin'] : null;
            }
            $agencia        = isset($query['agencia']) ? $query['agencia'] : null;
            $horario        = isset($query['horario']) ? $query['horario'] : null;

            $reservas       = DB::select('CALL filtrar_reservas(?,?,?,?)',
                                    [$fechaInicio, $fechaFin, $agencia, $horario]);
            $totales        = DB::select('CALL totales(?,?,?,?)', 
                                    [$fechaInicio, $fechaFin, $agencia, $horario]);

        }

        // Filtrar las reservas
        $reservasF = [];
        foreach ($reservas as $reserva) {
            if ($reserva->nombre_agencia !== 'WEB' || $reserva->payment_status !== 'pending') {
                $reservasF[] = $reserva;
            }
        }

        $reservas = $reservasF;
        // info('reservas', $reservas);
        // $finishedAt = time();
        
        // echo 'Tiempo: ' . ($finishedAt - $startedAt);
        return view('admin.index', compact( 'agencias', 'totales','estados', 'reservas', 'horarios'));
    }
    public function sales($locale)
    {
        App::setLocale($locale);
        return view('admin.sales');
    }

    public function privacy($locale)
    {
        App::setLocale($locale);
        $siteSections = SiteSection::all()->where('language', $locale)->groupBy('title');
        return view('privacy-policy', compact('locale', 'siteSections'));
    }

    public function terms($locale)
    {
        App::setLocale($locale);
        $siteSections = SiteSection::all()->where('language', $locale)->groupBy('title');
        return view('terms-conditions', compact('locale', 'siteSections'));
    }

    public function combos($locale)
    {
        App::setLocale($locale);
        return view('/combo/combo', compact('locale'));
    }
}
