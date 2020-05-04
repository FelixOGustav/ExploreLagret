<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampStartCampEndRegistrationOpenRegistrationCloses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registration_states', function (Blueprint $table) {
            $table->dateTime("campStart");
            $table->dateTime("campEnd");
            $table->dateTime("registrationOpen");
            $table->dateTime("registrationCloses");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registration_states', function (Blueprint $table) {
            //
        });
    }
}
