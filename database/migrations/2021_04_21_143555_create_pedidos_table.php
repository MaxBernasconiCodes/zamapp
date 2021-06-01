<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('agencia');
            $table->text('despachante');
            $table->text('consolidacion');
            $table->text('destino');
            $table->integer('contenedores');
            $table->text('descripcion')->nullable();
            $table->integer('pedido_nro')->unique();
            $table->text('semana_salida');
            $table->date('fecha_cortedocumental');
            $table->date('fecha_cortefisico');
            $table->text('barco_nombre');
            $table->integer('barco_contenedores');
            $table->text('barco_nro_contenedor');
            $table->text('barco_nro_remito');
            $table->text('barco_nro_booking');
            $table->date('fecha_destino');
            $table->integer('estado');
            $table->date('fecha_estado')->nullable();


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
