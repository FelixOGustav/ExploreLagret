<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSollebrunnGraffnasMagraToAccesslevels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accesslevels', function (Blueprint $table) {
            $table->integer('sollebrunn_grafsnas_magra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accesslevels', function (Blueprint $table) {
            $table->dropColumn('sollebrunn_grafsnas_magra');
        });
    }
}
