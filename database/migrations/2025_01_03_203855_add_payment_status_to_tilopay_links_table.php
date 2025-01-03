<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentStatusToTilopayLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tilopay_links', function (Blueprint $table) {
            $table->string('payment_status')->nullable()->default('pending')->after('callback_url'); // Estado del pago
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tilopay_links', function (Blueprint $table) {
            $table->dropColumn('payment_status');
        });
    }
}
