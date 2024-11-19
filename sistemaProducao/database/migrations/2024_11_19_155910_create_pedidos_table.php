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
            $table->dateTime('data_pedido', 0)->nullable(false);
            $table->enum('tipo_pagamento',['PIX', 'CREDITO', 'DEBITO'])->nullable(false);
            $table->dateTime('data_entrega',0)->nullable(false);
            $table->dateTime('data_entrega_efetuada',0);
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('clientes');
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
        Schema::table('pedidos', function (Blueprint $table){
            $table->dropForeign(['cliente_id']);
            $table->dropColumn('cliente_id');
        });

        Schema::dropIfExists('pedidos');
    }
}
