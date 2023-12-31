<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use App\Models\Horario;
use App\Models\Registro;
use App\Models\Reserva;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HorarioController extends Controller
{
    /**
     * @var Request
     */
    private $request;


    private $reglasValidacion = [
        'hora' => 'required',
        'capacidad_maxima' => 'required|gt:0',
        'hora_minima_reservar' => 'required',

    ];

    private $mensajesValidacion = [
        'required' => 'El campo :attribute es requerido',
        'gt'       => 'El campo :attribute debe ser mayor que 0'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $tours = Tour::all();
        $horarios = Horario::all();
        return view('admin.horarios.index', compact('tours', 'horarios'));
    }

    public function capacidad_maxima($hora)
    {
        $horario = Horario::find($hora);

        return $horario->capacidad_maxima;
    }

    public function cantidad_actual($hora)
    {
        $registro = Registro::where('id_horario', $hora)->first();
        return $registro->cantidad_reservas;
    }

    public function store()
    {
        $response = response(["message" => "Horario creado"], 201);

        $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

        if ($validator->fails()) {
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        } else {
            Horario::create([
                'id_tour' => $this->request->id_tour,
                'hora' => $this->request->hora,
                'capacidad_maxima'   => $this->request->capacidad_maxima,
                'hora_minima_reservar'   => $this->request->hora_minima_reservar,
            ]);
        }

        return $response;
    }

    public function update($id)
    {
        $response = response(["message" => "Horario actualizado"], 202);

        $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

        if ($validator->fails()) {
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        } else {
            Horario::find($id)->update([
                'id_tour' => $this->request->id_tour,
                'hora' => $this->request->hora,
                'capacidad_maxima'   => $this->request->capacidad_maxima,
                'hora_minima_reservar'   => $this->request->hora_minima_reservar,
            ]);
        }

        return $response;
    }

    public function destroy($id)
    {
        Horario::destroy($id);
        return response("", 204);
    }

    public function getSchedulesWeb($id, $selectedDate)
    {
        // Obtener todos los horarios para el tour y la fecha seleccionada
        $horarios = Horario::where('id_tour', $id)->get();

        // Obtener los IDs de las agencias específicas
        $agencyIdsToExclude = Agencia::whereIn('nombre', [
            'Wave Expeditions',
            'Ecoterra',
            'Rain Forest Explorer',
            'Quercus'
        ])->pluck('id');

        // info('Agencias a excluir: ' . $agencyIdsToExclude);

        $agencyWebId = Agencia::where('nombre', 'WEB')->value('id');

        // info('Agencia WEB: ' . $agencyWebId);

        // Filtrar los horarios basándose en las reservas existentes
        $horariosDisponibles = $horarios->filter(function ($horario) use ($selectedDate, $agencyIdsToExclude, $agencyWebId) {

            // Calcula la cantidad total de reservas para este horario en la fecha dada
            $reservas = Reserva::where('id_horario', $horario->id)
                ->whereHas('fecha_tour', function ($query) use ($selectedDate) {
                    $query->where('fecha', $selectedDate);
                })
                ->where(function ($query) use ($agencyIdsToExclude, $agencyWebId) {
                    $query->where(function ($q) use ($agencyIdsToExclude, $agencyWebId) {
                        $q->whereNotIn('id_agencia', $agencyIdsToExclude)
                        ->where('id_agencia', '!=', $agencyWebId);
                    })
                    ->orWhere(function($q) use ($agencyWebId) {
                        $q->where('id_agencia', $agencyWebId)
                          ->where('payment_status', 'Pagado');
                    });
                })
                ->sum(DB::raw('cantidad_adultos + cantidad_niños'));
                // ->get();

            // info('Reservas: ' . $reservas->toJson());

            // Calcula los cupos disponibles
            $cuposDisponibles = $horario->capacidad_maxima - $reservas;

            // Agrega la información de cupos disponibles al horario
            $horario->cupos_disponibles = $cuposDisponibles;

            // Comprueba si hay espacio disponible
            return $horario->makeHidden('created_at', 'updated_at', 'hora_minima_reservar');
        })->filter(function ($horario) {
            // Filtra los horarios que no tienen espacio disponible
            return $horario->cupos_disponibles > 0;
        });

        return response()->json($horariosDisponibles);
    }
}
