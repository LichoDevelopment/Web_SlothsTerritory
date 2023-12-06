<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTilopayTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tilopay_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reserva_id');
            $table->string('hashKey');
            $table->string('order_hash')->nullable();
            $table->integer('transaction_code')->nullable();
            $table->string('transaction_status')->nullable();
            $table->string('auth_code')->nullable();
            $table->decimal('amount', 10, 2);
            $table->decimal('commission_Tilopay_amount', 10, 2); //4.25% + 0.35 dolares
            $table->decimal('commission_system_amount', 10, 2); // 8.5% - 4.25%
            $table->string('currency');
            $table->string('billToFirstName');
            $table->string('billToLastName');
            $table->string('billToAddress');
            $table->string('billToAddress2');
            $table->string('billToCity');
            $table->string('billToState');
            $table->string('billToZipPostCode');
            $table->string('billToCountry');
            $table->string('billToTelephone');
            $table->string('billToEmail');
            $table->string('orderNumber');
            $table->string('capture');
            $table->string('subscription');
            $table->string('platform');
            $table->json('response')->nullable();

            $table->softDeletes();
            
            $table->timestamps();
        
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
        Schema::dropIfExists('tilopay_transactions');
    }
}
