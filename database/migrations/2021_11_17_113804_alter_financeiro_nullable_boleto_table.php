<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFinanceiroNullableBoletoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('financeiro', function (Blueprint $table) {
            $table->unsignedBigInteger('boleto_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('financeiro', function (Blueprint $table) {
            $table->unsignedBigInteger('boleto_id')->change();
        });
    }
}
