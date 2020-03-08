<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarAttendedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar_attendeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prize');
            $table->string('place');
            $table->string('name');
            $table->string('level');
            $table->string('title');
            $table->date('date');
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
        Schema::dropIfExists('seminar_attendeds');
    }
}
