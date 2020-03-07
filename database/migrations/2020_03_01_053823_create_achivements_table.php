<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchivementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achivements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->string("dept");
            $table->string("achive");
            $table->string("place");
            $table->string("organisation");
            $table->string("nature");
            $table->string("level");
            $table->date("date");
            $table->string("guidedBy");
            $table->integer("userId");
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
        Schema::dropIfExists('achivements');
    }
}
