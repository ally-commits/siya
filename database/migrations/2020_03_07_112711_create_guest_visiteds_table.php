<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestVisitedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_visiteds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date("date");
            $table->string("Name");
            $table->string("Designation");
            $table->string("activityHeld");
            $table->string("userId");
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
        Schema::dropIfExists('guest_visiteds');
    }
}
