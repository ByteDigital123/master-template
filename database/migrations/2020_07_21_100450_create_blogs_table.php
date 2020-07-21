<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('url')->unique()->nullable();
            $table->string('slug')->unique();
            $table->string('excerpt')->nullable();
            $table->json('content');
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
        Schema::drop('blogs');
    }

}
