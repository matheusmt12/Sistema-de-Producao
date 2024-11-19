<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedorPrimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedor_primas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_fornecedor');
            $table->unsignedBigInteger('id_materia');
            $table->foreign('id_fornecedor')->references('id')->on('fornecedors');
            $table->foreign('id_materia')->references('id')->on('materia_primas');
            $table->primary(['id_fornecedor','id_materia']);
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

        Schema::table('fornecedor_primas',function(Blueprint $table){
            $table->dropForeign(['id_fornecedor','id_materia']);
            $table->dropColumn(['id_fornecedor','id_materia']);
        });

        Schema::dropIfExists('fornecedor_primas');
    }
}
