<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociationProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('association_programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('NumberOfStudents');
            $table->date('date');
            $table->string('guest');
            $table->string('nature');
            $table->string('place');
            $table->string('level');
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
        Schema::dropIfExists('association_programs');
    }
}
