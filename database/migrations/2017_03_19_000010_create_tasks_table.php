<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->tinyInteger('status');
            $table->tinyInteger('type');
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('phone')->nullable();
            $table->string('priority')->nullable();
            $table->string('due')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
