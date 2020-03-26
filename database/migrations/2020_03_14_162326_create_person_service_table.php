<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_service', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('person_id');
            $table->bigInteger('service_id');
            $table->string('status')->nullable();
            // $table->primary(['person_id','service_id']);
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
        Schema::dropIfExists('person_service');
    }
}
