<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterConfigTarefasAddTituloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config_tarefas', function (Blueprint $table) {
            $table->string('titulo')->after('id');
            $table->longText('descricao')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('config_tarefas', function (Blueprint $table) {
            $table->dropColumn('titulo');
        });
    }
}
