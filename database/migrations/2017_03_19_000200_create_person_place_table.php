<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_place', function (Blueprint $table) {
            $table->integer('person_id')->unsigned()->nullable();
            $table->foreign('person_id')->references('id')
            ->on('people')->onDelete('cascade');

            $table->integer('place_id')->unsigned()->nullable();
            $table->foreign('place_id')->references('id')
            ->on('places')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints(); 
        Schema::dropIfExists('people');
        Schema::dropIfExists('places');
        Schema::dropIfExists('person_place');
        Schema::enableForeignKeyConstraints();
    }
}
