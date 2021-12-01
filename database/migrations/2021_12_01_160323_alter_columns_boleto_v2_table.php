<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnsBoletoV2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boletos', function(Blueprint $table)
        {
            $table->addColumn('text', 'seu_numero')->after('empresa_id');
            $table->addColumn('text', 'linha_digitavel')->after('codigo_barras');
            $table->addColumn('text', 'boleto_arquivo')->after('linha_digitavel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
