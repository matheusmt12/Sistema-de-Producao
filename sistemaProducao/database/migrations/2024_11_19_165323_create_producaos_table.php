<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produto');
            $table->foreign('id_produto')->references('id')->on('produtos');
            $table->integer('qnt_produzida')->nullable(false);
            $table->decimal('custo', 8 , 2)->nullable(false);
            $table->dateTime('data_entrega',0);
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
        Schema::table('producaos', function(Blueprint $table){
            $table->dropForeign(['id_produto']);
            $table->dropColumn('id_produto');
        });

        Schema::dropIfExists('producaos');
    }
}
