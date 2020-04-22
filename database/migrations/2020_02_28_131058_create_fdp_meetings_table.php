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
            $table->date('from');
            $table->date('to');
            $table->string("desc");
            $table->string('place');
            $table->string('department');
            $table->string('organisers');
            $table->string('typeOfMeeting');
            $table->string('level');
            $table->string('userId')->nullable(true);
            $table->string('adminId')->nullable(true);
            $table->string('deptId')->nullable(true);
            $table->timestamps();

            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('adminId')
                ->references('id')->on('admins')
                ->onDelete('cascade');

            $table->foreign('deptId')
                ->references('id')->on('depts')
                ->onDelete('cascade');
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
