<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedors', function (Blueprint $table) {
            $table->id();
            $table->string('nome_contato')->nullable(false);
            $table->string('rua')->nullable(false);
            $table->string('cidade')->nullable(false);
            $table->char('estado' , 2)->nullable(false);
            $table->string('telefone')->nullable(false);
            $table->string('cnpj', 14)->nullable(false);
            $table->string('razao_social');
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
        Schema::dropIfExists('fornecedors');
    }
}
