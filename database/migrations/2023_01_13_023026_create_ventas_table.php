<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cuenta_id')->nullable()->constrained('cuentas')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('cliente_id')->nullable()->constrained('clientes')->cascadeOnUpdate()->nullOnDelete();
            $table->float('pago',15);
            $table->boolean('status_pago')->default(0);
            $table->date('fecha_pago');
            $table->date('vencimiento');
            $table->string('pin_cuenta')->nullable();
            $table->bigInteger('forma_pago')->nullable();
            $table->string('ref')->nullable();
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
        Schema::dropIfExists('ventas');
    }
}
