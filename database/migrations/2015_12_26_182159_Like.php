<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Like extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Likes', function (Blueprint $table) {
            $table->increments('like_id');
            $table->integer('project_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->engine = 'InnoDB';
        });

        Schema::table('Likes', function(Blueprint $table){
            $table->foreign('user_id')->references('user_id')->on('Login')->onDelete('cascade');
            $table->foreign('project_id')->references('project_id')->on('Project')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Likes', function(Blueprint $table){
            $table->dropForeign('Likes_user_id_foreign');
            $table->dropForeign('Likes_project_id_foreign');
        });
        Schema::drop('Likes');
    }
}
