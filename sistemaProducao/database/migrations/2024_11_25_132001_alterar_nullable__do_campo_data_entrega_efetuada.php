<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AlterarNullableDoCampoDataEntregaEfetuada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pedidos', function(Blueprint $table){
            $table->dateTime('data_entrega_efetuada')->nullable(true)->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos', function(Blueprint $table){
            $table->dateTime('data_entrega_efetuada',0)->nullable(false)->change();

        });
    }
}
