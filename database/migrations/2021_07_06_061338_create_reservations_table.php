<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente');
            $table->integer('adultos');
            $table->integer('niños')->default(0);
            $table->integer('niños_gratis')->default(0);
            $table->integer('precio');
            $table->integer('precio_con_descuento');
            $table->date('fecha_inicio');
            $table->string('factura')->nullable();

            $table->unsignedBigInteger('agencia_id');
            $table->foreign('agencia_id')->references('id')->on('agencias');

            $table->unsignedBigInteger('tour_id');
            $table->foreign('tour_id')->references('id')->on('tours');
            
            $table->unsignedBigInteger('horario_id');
            $table->foreign('horario_id')->references('id')->on('horarios');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
