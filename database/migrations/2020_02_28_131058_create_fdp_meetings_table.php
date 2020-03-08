<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFdpMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fdp_meetings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('duration');
            $table->date('date');
            $table->string('place');
            $table->string('department');
            $table->string('organisers');
            $table->string('typeOfMeeting');
            $table->string('level');
            $table->string('userId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fdp_meetings');
    }
}
