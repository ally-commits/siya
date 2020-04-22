<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarOrganisedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar_organiseds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('collabAgency');
            $table->string('speaker');
            $table->string('title');
            $table->string('level');
            $table->string('department');
            $table->string('topic');
            $table->string('beneficiaries');
            $table->string('placeAndDesignation');
            $table->date('date');
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
        Schema::dropIfExists('seminar_organiseds');
    }
}
