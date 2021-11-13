<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('atividade_id');
            $table->unsignedBigInteger('conf_tarefa_id');
            $table->string("descricao");
            $table->boolean("finalizado");
            $table->timestamps();

            $table->foreign('atividade_id')->references('id')->on('atividades');
            $table->foreign('conf_tarefa_id')->references('id')->on('config_tarefas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
}
