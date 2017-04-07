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
            $table->timestamps();
            $table->softDeletes();
            $table->text('note')->nullable();
            $table->integer('date')->nullable();
            $table->integer('due')->nullable();
            $table->string('priority')->nullable();
            $table->integer('parent')->nullable();
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
