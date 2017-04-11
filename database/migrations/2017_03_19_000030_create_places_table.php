<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->tinyInteger('status');
            $table->tinyInteger('type');
            $table->timestamps();
            $table->softDeletes();
            $table->tinyInteger('category')->nullable();           
            $table->text('note')->nullable();
            $table->text('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('alt')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->string('division')->nullable();
            $table->string('refer')->nullable();
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->string('fax')->nullable();
            $table->string('account')->nullable();
            $table->string('parent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
