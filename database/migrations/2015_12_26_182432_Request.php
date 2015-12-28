<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Request extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Request', function (Blueprint $table) {
            $table->increments('request_id');
            $table->integer('status');
            $table->integer('project_id')->unsigned()->unique();
            $table->integer('sender_id')->unsigned()->unique();
            $table->integer('reciever_id')->unsigned()->unique();
            $table->engine = 'InnoDB';
        });

        Schema::table('Request', function(Blueprint $table){
            $table->foreign('sender_id')->references('user_id')->on('Login')->onDelete('cascade');
            $table->foreign('reciever_id')->references('user_id')->on('Login')->onDelete('cascade');
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
        Schema::table('Request', function(Blueprint $table){
            $table->dropForeign('Request_reciever_id_foreign');
            $table->dropForeign('Request_sender_id_foreign');
            $table->dropForeign('Request_project_id_foreign');
        });
        Schema::drop('Request');
    }
}
