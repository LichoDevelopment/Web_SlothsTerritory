<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();

            // Si en algun momento relacionamos con la tabla reservas
            $table->unsignedBigInteger('id_reserva')->nullable();
            $table->foreign('id_reserva')->references('id')->on('reservas')->onDelete('set null');

            // Fecha del pago
            $table->timestamp('fecha_pago')->useCurrent();

            // Montos en diferentes métodos de pago y monedas
            $table->decimal('efectivo_crc', 10, 2)->default(0);
            $table->decimal('efectivo_usd', 10, 2)->default(0);
            $table->decimal('tarjeta_crc', 10, 2)->default(0);
            $table->decimal('tarjeta_usd', 10, 2)->default(0);
            $table->decimal('transferencia_crc', 10, 2)->default(0);
            $table->decimal('transferencia_usd', 10, 2)->default(0);

            // Tipo de concepto (reserva, venta_producto, gerencia, etc.)
            $table->string('tipo_concepto')->nullable();

            // Observaciones
            $table->text('observaciones')->nullable();

            // Auditoría
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            // Timestamps
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
        Schema::dropIfExists('pagos');
    }
}
