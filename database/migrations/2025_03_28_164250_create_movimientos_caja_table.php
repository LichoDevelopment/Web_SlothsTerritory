<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosCajaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos_caja', function (Blueprint $table) {
            $table->id();

            // Relación con caja
            $table->unsignedBigInteger('id_caja');
            $table->foreign('id_caja')->references('id')->on('cajas')->onDelete('cascade');

            // Ingreso o Egreso
            $table->string('tipo_movimiento'); // 'ingreso' o 'egreso'

            // Diferentes métodos de pago
            $table->decimal('efectivo_crc', 10, 2)->default(0);
            $table->decimal('efectivo_usd', 10, 2)->default(0);
            $table->decimal('tarjeta_crc', 10, 2)->default(0);
            $table->decimal('tarjeta_usd', 10, 2)->default(0);
            $table->decimal('transferencia_crc', 10, 2)->default(0);
            $table->decimal('transferencia_usd', 10, 2)->default(0);

            // Descripción
            $table->string('motivo')->nullable(); 
            // Ej: 'venta', 'pago_reserva', 'retiro_gerencia', ...
            $table->text('descripcion')->nullable();

            $table->dateTime('fecha_movimiento');

            // FK a pagos (opcional)
            $table->unsignedBigInteger('id_pago')->nullable();
            $table->foreign('id_pago')->references('id')->on('pagos')->onDelete('set null');

            // En caso de egresos, quién retiró el dinero
            $table->string('retirado_por')->nullable();

            // Auditoría
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('movimientos_caja');
    }
}
