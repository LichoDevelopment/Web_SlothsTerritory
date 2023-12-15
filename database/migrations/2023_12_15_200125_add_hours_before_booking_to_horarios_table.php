<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHoursBeforeBookingToHorariosTable extends Migration
{
    public function up()
    {
        Schema::table('horarios', function (Blueprint $table) {
            // DECIMAL con dos dígitos de precisión y uno para la escala, por ejemplo '1.5'
            $table->decimal('hours_before_booking', 2, 1)->default(0.0);
        });
    }

    public function down()
    {
        Schema::table('horarios', function (Blueprint $table) {
            $table->dropColumn('hours_before_booking');
        });
    }
}
