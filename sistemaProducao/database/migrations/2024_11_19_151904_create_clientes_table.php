<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable(false);
            $table->string('cnpj', 14)->nullable(false);
            $table->string('razao_social')->nullable(false);
            $table->string('ramo_ativo')->nullable(false);
            $table->string('nome_responsavel')->nullable(false);
            $table->string('telefone',15)->nullable(false);
            $table->string('rua')->nullable(false);
            $table->string('cidade')->nullable(false);
            $table->string('num_casa')->nullable(false);
            $table->char('estado', 2)->nullable(false);
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
        Schema::dropIfExists('clientes');
    }
}