<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTypeColumnDescricaoFinanceiroReceberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('financeiro_receber', function (Blueprint $table) {
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
        Schema::table('financeiro_receber', function (Blueprint $table) {
            $table->string('descricao')->change();
        });
    }
}
