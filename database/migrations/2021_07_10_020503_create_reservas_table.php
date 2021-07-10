<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_agencia');
            $table->unsignedBigInteger('id_tour');
            $table->unsignedBigInteger('id_fecha_tour');

            $table->string('nombre_cliente');
            $table->integer('cantidad_adultos')->default(0);
            $table->integer('cantidad_ninios')->default(0);
            $table->integer('cantidad_ninios_gratis')->default(0);
            $table->decimal('monto_total');
            $table->decimal('descuento')->default(0);
            $table->decimal('monto_con_descuento');
            $table->decimal('comision_agencia');
            $table->decimal('monto_neto');
            $table->string('factura')->nullable();
            $table->timestamps();

            // FK
            $table->foreign('id_agencia')->references('id')->on('agencias');

            $table->foreign('id_tour')->references('id')->on('tours');
            
            $table->foreign('id_fecha_tour')->references('id')->on('fecha_tour');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}