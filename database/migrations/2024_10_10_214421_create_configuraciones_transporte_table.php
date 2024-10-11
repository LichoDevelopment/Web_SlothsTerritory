<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracionesTransporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuraciones_transporte', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio_minimo', 8, 2);
            $table->decimal('distancia_maxima', 8, 2);
            $table->decimal('distancia_minima', 8, 2);
            $table->decimal('precio_por_km_adicional', 8, 2);
            $table->integer('cantidad_maxima_pasajeros');
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
        Schema::dropIfExists('configuraciones_transporte');
    }
}
