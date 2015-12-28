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
        Schema::create('Like', function (Blueprint $table) {
            $table->increments('like_id');
            $table->integer('project_id')->unsigned()->unique();
            $table->integer('user_id')->unsigned()->unique();
            $table->engine = 'InnoDB';
        });

        Schema::table('Like', function(Blueprint $table){
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
        Schema::table('Like', function(Blueprint $table){
            $table->dropForeign('Like_user_id_foreign');
            $table->dropForeign('Like_project_id_foreign');
        });
        Schema::drop('Like');
    }
}
