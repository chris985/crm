<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_task', function (Blueprint $table) {
            $table->integer('place_id')->unsigned()->nullable();
            $table->foreign('place_id')->references('id')
            ->on('places')->onDelete('cascade');

            $table->integer('task_id')->unsigned()->nullable();
            $table->foreign('task_id')->references('id')
            ->on('tasks')->onDelete('cascade');
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
        Schema::dropIfExists('places');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('place_task');
        Schema::enableForeignKeyConstraints();
    }
}
