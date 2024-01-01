<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisiMisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visi_misis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_visi');
            $table->text('body_visi');
            $table->string('title_misi');
            $table->text('body_misi');
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
        Schema::dropIfExists('visi_misis');
    }
}
