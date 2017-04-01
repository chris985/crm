<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_task', function (Blueprint $table) {
            $table->integer('person_id')->unsigned()->nullable();
            $table->foreign('person_id')->references('id')
            ->on('people')->onDelete('cascade');

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
        Schema::dropIfExists('people');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('person_task');
        Schema::enableForeignKeyConstraints();
    }
}
