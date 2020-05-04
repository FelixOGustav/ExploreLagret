<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampIdToRegistrationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->integer('camp_id');
        });

        Schema::table('registrations_cancels', function (Blueprint $table) {
            $table->integer('camp_id');
        });

        Schema::table('registrations_leaders', function (Blueprint $table) {
            $table->integer('camp_id');
        });

        Schema::table('registrations_leaders_cancels', function (Blueprint $table) {
            $table->integer('camp_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn('camp_id');
        });

        Schema::table('registrations_cancels', function (Blueprint $table) {
            $table->dropColumn('camp_id');
        });

        Schema::table('registrations_leaders', function (Blueprint $table) {
            $table->dropColumn('camp_id');
        });

        Schema::table('registrations_leaders_cancels', function (Blueprint $table) {
            $table->dropColumn('camp_id');
        });
    }
}
