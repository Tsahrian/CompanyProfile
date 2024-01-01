<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_slider', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_slider');
            $table->text('slug');
            $table->text('body');
            $table->integer('category_id');
            $table->integer('user_id');
            $table->string('image_slider');
            $table->boolean('is_active');
            $table->integer('views');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_slider');
    }
}
