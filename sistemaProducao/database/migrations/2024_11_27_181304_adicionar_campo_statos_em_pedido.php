<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionarCampoStatosEmPedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pedidos',function(Blueprint $table){
            $table->enum('status',['ENTREGUE','CANCELADO','A CAMINHO','ATRASADO'])->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('pedidos',function(Blueprint $table){
            $table->dropColumn('status');
        });
    }
}
