<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmpresasUsuariosAddSetorIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas_usuarios', function (Blueprint $table) {
            $table->unsignedBigInteger('setor_id')->after('empresa_id');
            $table->foreign('setor_id')->references('id')->on('config_setores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresas_usuarios', function (Blueprint $table) {
            $table->dropForeign(['setor_id']);
        });
    }
}
