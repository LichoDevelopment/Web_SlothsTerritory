<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_horario');
            $table->unsignedBigInteger('id_fecha');
            $table->integer('cantidad_reservas');
            $table->timestamps();
            // FK
            $table->foreign('id_horario')->references('id')->on('horarios');
            
            $table->foreign('id_fecha')->references('id')->on('fecha_tour');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro');
    }
}
