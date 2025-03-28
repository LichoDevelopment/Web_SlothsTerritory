<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_apertura');
            $table->dateTime('fecha_cierre')->nullable();

            $table->decimal('monto_inicial_crc', 10, 2)->default(0);
            $table->decimal('monto_inicial_usd', 10, 2)->default(0);

            $table->text('observaciones_apertura')->nullable();
            $table->text('observaciones_cierre')->nullable();

            $table->string('estado')->default('abierta'); 
            // 'abierta' o 'cerrada'

            // Auditoría
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->unsignedBigInteger('abierta_por')->nullable(); 
            $table->unsignedBigInteger('cerrada_por')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // FKs
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cajas');
    }
}
