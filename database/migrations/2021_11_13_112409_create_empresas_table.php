<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fantasia');
            $table->string('razao');
            $table->string('cnpj');
            $table->string('atividade');
            $table->string('rua');
            $table->string('numero');
            $table->string('completmento');
            $table->string('bairro');
            $table->string('cep');
            $table->string('cidade');
            $table->string('estado');
            $table->string('telefonePrincipal');
            $table->string('telefoneSecundario');
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
        Schema::dropIfExists('empresas');
    }
}
