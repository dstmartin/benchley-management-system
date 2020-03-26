<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->string('phoneHome')->nullable();
            $table->string('phoneCell')->nullable();
            $table->string('phoneWork')->nullable();
            $table->date('birthdate');
            $table->string('gender');
            $table->boolean('is_member')->default(0);
            $table->bigInteger('family_id')->unsigned()->index()->nullable();
            $table->foreign('family_id')->references('id')->on('families');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
