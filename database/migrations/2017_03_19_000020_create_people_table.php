<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->unsigned();
            $table->string('name', '150');
            $table->unsignedSmallInteger('status');
            $table->unsignedSmallInteger('type');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedSmallInteger('category')->nullable();
            $table->text('note')->nullable();
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('alt')->nullable();
            $table->string('email', '255')->nullable();
            $table->string('web')->nullable();
            $table->string('title')->nullable();
            $table->string('refer')->nullable();
            $table->string('first', '50')->nullable();
            $table->string('last', '50')->nullable();
            $table->string('prefix', '10')->nullable();
            $table->string('account')->nullable();
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
