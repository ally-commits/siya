<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestLectureMDPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_lecture_m_d_p_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date("date");
            $table->string("resourcePerson");
            $table->string("place");
            $table->string("designation");
            $table->string("topic");
            $table->string("department");
            $table->string("beneficiaries");
            $table->string('userId')->nullable(true); 
            $table->string('adminId')->nullable(true); 
            $table->timestamps();

            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('adminId')
                ->references('id')->on('admins')
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
        Schema::dropIfExists('guest_lecture_m_d_p_s');
    }
}
