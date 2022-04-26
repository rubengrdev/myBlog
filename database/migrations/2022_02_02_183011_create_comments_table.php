<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('contents');
            $table->foreignId('post_id')->unsigned();
            $table->foreignId('user_id')->unsigned();
            $table->timestamps();

        });
        Schema::table('comments', function($table){
            //si eliminamos el post o los usuarios los comentarios se eliminarán para que no haya problemas
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign('post_id');
        Schema::dropForeign('user_id');
        Schema::dropIfExists('comments');

    }
}
