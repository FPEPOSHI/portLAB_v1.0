<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Project extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Project', function (Blueprint $table) {
            $table->increments('project_id');
            $table->string('title',255);
            $table->string('description',1000);
            $table->string('project_path',255);
            $table->dateTime('upload_date');
            $table->integer('views');
            $table->integer('like');
            $table->integer('downloads');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('format_id')->unsigned();
            $table->engine = 'InnoDB';
        });

        Schema::table('Project', function(Blueprint $table){
            $table->foreign('user_id')->references('user_id')->on('Login')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('Category')->onDelete('cascade');
            $table->foreign('format_id')->references('format_id')->on('Format')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Project', function(Blueprint $table){
            $table->dropForeign('Project_user_id_foreign');
            $table->dropForeign('Project_category_id_foreign');
            $table->dropForeign('Project_format_id_foreign');
        });
        Schema::drop('Project');
    }
}
