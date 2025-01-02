<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusFieldsToReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->boolean('pendiente_cobrar')->default(false)->after('email'); // Campo para indicar si está pendiente de cobrar
            $table->boolean('llego')->default(false)->after('pendiente_cobrar'); // Campo para indicar si ya llegó o no
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->dropColumn(['pendiente_cobrar', 'llego']);
        });
    }
}
