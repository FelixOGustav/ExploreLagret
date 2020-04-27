<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSsnAdvocateToRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->date("birthdayAdvocate");
            $table->integer("lastFourAdvocate");
        });

        Schema::table('registrations_cancels', function (Blueprint $table) {
            $table->date("birthdayAdvocate");
            $table->integer("lastFourAdvocate");
        });

        Schema::table('registrations_leaders', function (Blueprint $table) {
            $table->date("birthdayAdvocate");
            $table->integer("lastFourAdvocate");
        });

        Schema::table('registrations_leaders_cancels', function (Blueprint $table) {
            $table->date("birthdayAdvocate");
            $table->integer("lastFourAdvocate");
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
            $table->dropColumn("birthdayAdvocate");
            $table->dropColumn("lastFourAdvocate");
        });

        Schema::table('registrations_cancels', function (Blueprint $table) {
            $table->dropColumn("birthdayAdvocate");
            $table->dropColumn("lastFourAdvocate");
        });

        Schema::table('registrations_leaders', function (Blueprint $table) {
            $table->dropColumn("birthdayAdvocate");
            $table->dropColumn("lastFourAdvocate");
        });

        Schema::table('registrations_leaders_cancels', function (Blueprint $table) {
            $table->dropColumn("birthdayAdvocate");
            $table->dropColumn("lastFourAdvocate");
        });
    }
}
