<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterChangeDddPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empresas', function(Blueprint $table)
        {
            $table->dropColumn("ddd");
        });
        Schema::table('empresas', function (Blueprint $table) {
            $table->text('ddd')->after('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresas', function(Blueprint $table)
        {
            $table->dropColumn("ddd");
        });
        Schema::table('empresas', function (Blueprint $table) {
            $table->text('ddd')->after('estado');
        });
    }
}
