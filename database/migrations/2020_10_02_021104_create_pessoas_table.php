<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpf');
            $table->string('rg');
            $table->string('nacionalidade');
            $table->string('estadoCivil');
            $table->string('profissao');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cep');
            $table->string('cidade');
            $table->string('estado');
            $table->string('telefone')->nullable();
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
        Schema::dropIfExists('pessoas');
    }
}
