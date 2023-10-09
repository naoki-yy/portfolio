<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('day_id')->unsigned()->index();
            $table->string('title');
            $table->string('concept');
            $table->string('area');
            $table->string('triptime');
            $table->string('heading');
            $table->text('body');
            $table->string('traffic');
            $table->string('traffic_detail');
            $table->timestamps();
            $table->softDeletes();
            // 外部キー制約
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scedules');
    }
}
