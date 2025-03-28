<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdReservaToMovimientosCajaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movimientos_caja', function (Blueprint $table) {
            $table->unsignedBigInteger('id_reserva')->nullable()->after('id_pago');

            $table->foreign('id_reserva')->references('id')->on('reservas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movimientos_caja', function (Blueprint $table) {
            $table->dropForeign(['id_reserva']);
            $table->dropColumn('id_reserva');
        });
    }
}
