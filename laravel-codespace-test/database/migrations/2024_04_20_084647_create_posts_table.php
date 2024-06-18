<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->string('headline');
            $table->text('text');
            $table->date('publish_date');
            $table->string('category');
            $table->string('keywords')->nullable();
            $table->string('filename')->nullable();
            $table->string('filepath')->nullable();
            $table->dateTime('upload_date')->nullable();
            $table->integer('image_width')->nullable();
            $table->integer('image_height')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
