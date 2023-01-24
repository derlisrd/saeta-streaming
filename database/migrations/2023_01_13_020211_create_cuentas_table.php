<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email_cuenta')->unique();
            $table->float('valor_unitario',15)->nullable();
            $table->float('valor_total',15)->nullable();
            $table->string('password');
            $table->boolean('pago_status')->default(0);
            $table->date('fecha_pago');
            $table->date('vencimiento_pago');
            $table->integer('cuentas_disponibles')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentas');
    }
}
