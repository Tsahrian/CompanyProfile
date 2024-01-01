<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextIntrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_intros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_intro');
            $table->text('body_intro');
            $table->text('slug');
            $table->integer('category_id');
            $table->integer('user_id');
            $table->integer('is_active');
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
        Schema::dropIfExists('text_intros');
    }
}
