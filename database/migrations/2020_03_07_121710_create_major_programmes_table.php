<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('major_programmes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date("from");
            $table->date("to");
            $table->string("desc");
            $table->string("programme");
            $table->string("facultyAssociation");
            $table->string("noOfBeneficiaries");
            $table->string("level");
            $table->string("department");
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
        Schema::dropIfExists('major_programmes');
    }
}
