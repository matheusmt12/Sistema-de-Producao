<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_materias', function (Blueprint $table) {
            $table->unsignedBigInteger('id_produto');
            $table->unsignedBigInteger('id_materia');
            $table->foreign('id_produto')->references('id')->on('produtos');
            $table->foreign('id_materia')->references('id')->on('materia_primas');
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
        Schema::table('produto_materias', function(Blueprint $table){
            $table->dropForeign(['id_produto','id_materia']);
            $table->dropColumn(['id_produto','id_materia']);
        });
        Schema::dropIfExists('produto_materias');
    }
}
