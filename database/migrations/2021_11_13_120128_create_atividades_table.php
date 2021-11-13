<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('config_setor_id');
            $table->unsignedBigInteger('config_ativ_id');
            $table->string('descricao');
            $table->date('abertura');
            $table->date('fechamento');
            $table->boolean('recorrente');
            $table->integer('periodo');
            $table->integer('finalizado');
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('config_setor_id')->references('id')->on('config_setores');
            $table->foreign('config_ativ_id')->references('id')->on('config_atividades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atividades');
    }
}
