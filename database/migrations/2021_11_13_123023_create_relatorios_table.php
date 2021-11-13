<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('atividade_id');
            $table->unsignedBigInteger('setor_id');

            $table->string('descricao');
            $table->date('abertura');
            $table->date('inicio');
            $table->date('finalizacao');
            $table->timestamps();

            $table->foreign('usuario_id')->references('usuario_id')->on('atividades_usuario');
            $table->foreign('empresa_id')->references('empresa_id')->on('atividades');
            $table->foreign('atividade_id')->references('id')->on('atividades');
            $table->foreign('setor_id')->references('config_setor_id')->on('atividades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relatorios');
    }
}
