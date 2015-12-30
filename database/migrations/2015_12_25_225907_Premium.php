<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Premium extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Premium', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('start_date',20);
            $table->dateTime('end_date',20);
            $table->integer('user_id')->unsigned();
            $table->engine = 'InnoDB';
        });

        Schema::table('Premium', function(Blueprint $table){
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
        Schema::table('Premium', function(Blueprint $table){
            $table->dropForeign('Premium_user_id_foreign');
        });
        Schema::drop('Premium');
    }
}
