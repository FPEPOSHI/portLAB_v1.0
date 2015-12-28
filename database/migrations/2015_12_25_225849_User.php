<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('email',50);
            $table->string('photo',250);
            $table->integer('user_id')->unsigned()->unique();
            $table->engine = 'InnoDB';
        });

        Schema::table('User', function(Blueprint $table){
            $table->foreign('user_id')->references('user_id')->on('Login')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('User', function(Blueprint $table){
            $table->dropForeign('User_user_id_foreign');
        });

        Schema::drop('User');

    }
}
