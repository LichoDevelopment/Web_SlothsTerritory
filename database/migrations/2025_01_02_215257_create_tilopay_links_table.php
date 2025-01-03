<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTilopayLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tilopay_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reserva_id');  // Relacion con tu tabla reservas
            $table->string('tilopay_id')->nullable();  // ID que devuelve TiloPay al crear el link
            $table->string('url')->nullable();         // URL del link de pago de TiloPay
            $table->string('currency', 10)->default('USD');
            $table->decimal('amount', 10, 2);
            $table->string('reference')->nullable();
            $table->tinyInteger('type')->default(0);   // 0=ilimitado, 1=una sola vez
            $table->string('description')->nullable();
            $table->string('client')->nullable();      // Nombre del cliente
            $table->string('callback_url')->nullable();
            $table->timestamps();
            
            // Clave foránea para la reserva
            $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tilopay_links');
    }
}
