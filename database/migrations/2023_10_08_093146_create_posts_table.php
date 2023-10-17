<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();

            $table->text('cover_image_path');

            $table->string("title");
            $table->string("concept");
            $table->string("area");
            $table->string("recommendation_point1");
            $table->string("recommendation_image1")->nullable();
            $table->string("recommendation_text1");          
            $table->string("recommendation_point2"); 
            $table->string("recommendation_image2")->nullable(); 
            $table->string("recommendation_text2");
            $table->string("recommendation_point3"); 
            $table->string("recommendation_image3") ->nullable();
            $table->string("recommendation_text3"); 
            $table->timestamps();
            $table->softDeletes();
            // 外部キー制約
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
        Schema::dropIfExists('posts');
    }
}
