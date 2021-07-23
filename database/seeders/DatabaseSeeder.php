<?php

namespace Database\Seeders;

use App\Models\Agencia;
use App\Models\Estado;
use App\Models\Fecha_tour;
use App\Models\Horario;
use App\Models\Precio;
use App\Models\Registro;
use App\Models\Reserva;
use App\Models\Role;
use App\Models\Tour;
use App\Models\User;
use Dotenv\Util\Regex;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $rol_admin = new Role();
        $rol_admin->name = 'admin';
        $rol_admin->save();

        $rol_empleado = new Role();
        $rol_empleado->name = 'empleado';
        $rol_empleado->save();

        // USUARIOS
        $Usuario = new User();
        $Usuario->name = "Licho";
        $Usuario->email = "licho@gmail.com";
        $Usuario->password = '$2y$10$bcbD6Os4ZNBjzybxgGCAtuRs5DL14YwPHB5cDbSq1dIXzFMxAOQeO'; //123456
        $Usuario->rol_id = 1;
        $Usuario->save();

        $Usuario2 = new User();
        $Usuario2->name = "test";
        $Usuario2->email = "test@mail.com";
        $Usuario2->password = '$2y$10$g5OX3HHhvCVjKB4oBIE1melvJ0iTw14VznfEyzsICY5.'; //123456
        $Usuario2->rol_id = 2;
        $Usuario2->save();

        $Usuario3 = new User();
        $Usuario3->name = "keilor";
        $Usuario3->email = "keilor@gmail.com";
        $Usuario3->password = '$2y$10$g5OX3HHhvCVjKB4oBIE1melvJ0iTw14VznfEyzsICY5.'; //123456
        $Usuario3->rol_id = 1;
        $Usuario3->save();


        // TOURS
            // tour diurno
        $tour = new Tour();
        $tour->nombre = "Tour diurno";
        $tour->save();
            // tour nocturno
        $tour2 = new Tour();
        $tour2->nombre = "Tour nocturno";
        $tour2->save();
            // tour aves
        $tour3 = new Tour();
        $tour3->nombre = "Tour aves";
        $tour3->save();
        

        // PRECIOS
            // precios tour diurno
        $precio = new Precio();
        $precio->id_tour = '1';
        $precio->precio_adulto = '20';
        $precio->precio_niño = '15';
        $precio->save();
            // precios tour nocturno
        $precio2 = new Precio();
        $precio2->id_tour = '2';
        $precio2->precio_adulto = '25';
        $precio2->precio_niño = '19';
        $precio2->save();
            // precios tour aves
        $precio3 = new Precio();
        $precio3->id_tour = '3';
        $precio3->precio_adulto = '10';
        $precio3->precio_niño = '5';
        $precio3->save();


        // Horarios
            // horario tour diurno
        $horario = new Horario();
        $horario->id_tour = "1";
        $horario->hora = "08:00:00";
        $horario->capacidad_maxima = "10";
        $horario->hora_minima_reservar = "06:00:00";
        $horario->save();
        // horario tour diurno
        $horario2 = new Horario();
        $horario2->id_tour = "1";
        $horario2->hora = "10:00:00";
        $horario2->capacidad_maxima = "10";
        $horario2->hora_minima_reservar = "08:00:00";
        $horario2->save();
        // horario tour diurno
        $horario3 = new Horario();
        $horario3->id_tour = "1";
        $horario3->hora = "13:00:00";
        $horario3->capacidad_maxima = "10";
        $horario3->hora_minima_reservar = "11:00:00";
        $horario3->save();
        // horario tour diurno
        $horario4 = new Horario();
        $horario4->id_tour = "1";
        $horario4->hora = "15:00:00";
        $horario4->capacidad_maxima = "10";
        $horario4->hora_minima_reservar = "13:00:00";
        $horario4->save();
        // horario tour noctuno
        $horario5 = new Horario();
        $horario5->id_tour = "2";
        $horario5->hora = "18:00:00";
        $horario5->capacidad_maxima = "10";
        $horario5->hora_minima_reservar = "16:00:00";
        $horario5->save();
        // horario tour aves
        $horario6 = new Horario();
        $horario6->id_tour = "3";
        $horario6->hora = "05:00:00";
        $horario6->capacidad_maxima = "10";
        $horario6->hora_minima_reservar = "03:00:00";
        $horario6->save();



        // AGENCIAS
        $agencia = new Agencia();
        $agencia->nombre ="Directos";
        $agencia->comision = "0";
        $agencia->save();

        $agencia2 = new Agencia();
        $agencia2->nombre ="Desafío";
        $agencia2->comision = "8";
        $agencia2->save();

        $agencia3 = new Agencia();
        $agencia3->nombre ="Ecoterra";
        $agencia3->comision = "5";
        $agencia3->save();



        // FECHA
        $fecha = new Fecha_tour();
        $fecha->fecha = "2021-07-13";
        $fecha->save();

        $fecha2 = new Fecha_tour();
        $fecha2->fecha = "2021-07-14";
        $fecha2->save();

        // Estados
        $estado = new Estado();
        $estado->nombre ="Pendiente";
        $estado->save();

        $estado2 = new Estado();
        $estado2->nombre ="No llegó";
        $estado2->save();

        $estado3 = new Estado();
        $estado3->nombre ="Finalizado";
        $estado3->save();

        // RESERVA
        $reserva = new Reserva();
        $reserva->id_agencia = "1"; // Reserva  Directos
        $reserva->id_tour ="1"; // Tour diurno
        $reserva->id_fecha_tour = "1"; // Fecha 14 - 7 - 2021
        $reserva->id_horario = "1"; // horarios 8 a.m
        $reserva->id_precio = "1";  // precio 20 y 15
        $reserva->id_estado = "1";
        $reserva->nombre_cliente = "Ulises";
        $reserva->cantidad_adultos = "2";
        $reserva->cantidad_niños = "2";
        $reserva->cantidad_niños_gratis = "1";
        $reserva->monto_total = "70";
        $reserva->descuento = "0";
        $reserva->monto_con_descuento = "70";
        $reserva->comision_agencia = "0";
        $reserva->monto_neto = "70";
        $reserva->factura = "null";
        $reserva->save();



        $reserva2 = new Reserva();
        $reserva2->id_agencia = "2"; // Reserva  Desafío
        $reserva2->id_tour ="2"; // Tour nocturno
        $reserva2->id_fecha_tour = "1"; // Fecha 14 - 7 - 2021
        $reserva2->id_horario = "2"; // horarios 10 a.m
        $reserva2->id_precio = "1"; // precio 20 y 15
        $reserva2->id_estado = "1";
        $reserva2->nombre_cliente = "Licho";
        $reserva2->cantidad_adultos = "2";
        $reserva2->cantidad_niños = "1";
        $reserva2->cantidad_niños_gratis = "0";
        $reserva2->monto_total = "69";
        $reserva2->descuento = "0";
        $reserva2->monto_con_descuento = "69";
        $reserva2->comision_agencia = "8";
        $reserva2->monto_neto = "61";
        $reserva2->factura = "AA1234";
        $reserva2->save();


        // REGISTROS
        $registro = new Registro();
        $registro->id_horario = "1"; // 8 a.m
        $registro->id_fecha = "1";
        $registro->cantidad_reservas = "5";
        $registro->save();

        $registro2 = new Registro();
        $registro2->id_horario = "2"; // 8 a.m
        $registro2->id_fecha = "1";
        $registro2->cantidad_reservas = "3";
        $registro2->save();

        


    }
}

// App\Models\User::create(["name" => "licho", "email" => "licho@gmail.com", "password" => Hash::make('123456')]);