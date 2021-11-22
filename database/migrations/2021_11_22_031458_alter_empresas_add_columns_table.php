<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmpresasAddColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->string('inscricaoMunicipal', 255)->after('razao')->nullable();
            $table->string('inscricaoEstadual', 255)->after('razao')->nullable();
            $table->string('cnae', 255)->after('razao')->nullable();
            $table->string('complemento')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->dropColumn('inscricaoMunicipal');
            $table->dropColumn('inscricaoEstadual');
            $table->dropColumn('cnae');
            $table->string('complemento')->nullable(false)->change();
        });
    }
}
