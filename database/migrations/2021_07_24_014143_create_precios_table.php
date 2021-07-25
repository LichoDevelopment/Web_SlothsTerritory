<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tour');
            $table->unsignedBigInteger('id_agencia');
            $table->decimal('precio_adulto');
            $table->decimal('precio_niño');

            $table->foreign('id_tour')->references('id')->on('tours');
            $table->foreign('id_agencia')->references('id')->on('agencias');

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
        Schema::dropIfExists('precios');
    }
}
