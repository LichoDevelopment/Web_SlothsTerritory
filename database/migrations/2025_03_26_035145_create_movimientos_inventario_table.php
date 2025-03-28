<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos_inventario', function (Blueprint $table) {
            $table->id();

            // FK al producto
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')->references('id')->on('productos');

            // Tipo de movimiento
            // Podrías usar un enum en MySQL; en Laravel a menudo usamos string para mayor flexibilidad
            $table->string('tipo_movimiento'); // 'entrada', 'salida', etc.

            // Cantidad que se ingresa o sale
            $table->integer('cantidad');

            // Costos y precios (pueden ser null si no aplican)
            $table->decimal('costo_unitario', 10, 2)->nullable();
            $table->decimal('precio_venta_unitario', 10, 2)->nullable();

            // Motivo
            $table->string('motivo')->nullable(); 
            // Ejemplo: 'compra', 'venta', 'merma', 'gerencia', etc.

            // Fecha del movimiento
            $table->timestamp('fecha_movimiento')->useCurrent();

            // FK a pagos (nullable, por si no hay pago asociado, como en caso de merma/gerencia)
            $table->unsignedBigInteger('id_pago')->nullable();
            $table->foreign('id_pago')->references('id')->on('pagos')->onDelete('set null');
            // Nota: la tabla 'pagos' la crearemos en otro migration, 
            // así que cuidado con el orden de migración o utiliza "foreign key constraints after creation".

            // Auditoría
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            // Timestamps
            $table->timestamps();
            $table->softDeletes();

            // FKs de auditoría
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
        Schema::dropIfExists('movimientos_inventario');
    }
}
