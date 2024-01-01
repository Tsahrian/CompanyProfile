<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleIntroEnToTextIntrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('text_intros', function (Blueprint $table) {
            $table->string('title_intro_en')->after('title_intro');
            $table->string('body_intro_en')->after('body_intro');

        });

        Schema::table('image_slider', function (Blueprint $table) {
            $table->string('title_slider_en')->after('title_slider');
            $table->string('body_en')->after('body');

        });
        Schema::table('jasas', function (Blueprint $table) {
            $table->string('title_jasa_en')->after('title_jasa');
            $table->string('body_jasa_en')->after('body_jasa');

        });
        Schema::table('photo_gallery', function (Blueprint $table) {
            $table->string('title_photo_en')->after('title_photo');
            $table->string('body_en')->after('body');

        });
        Schema::table('youtubes', function (Blueprint $table) {
            $table->string('title_video_en')->after('title_video');

        });
        Schema::table('blog', function (Blueprint $table) {
            $table->string('title_en')->after('title');
            $table->string('body_en')->after('body');

        });
        Schema::table('visi_misis', function (Blueprint $table) {
            $table->string('title_en')->after('title');
            $table->string('body_en')->after('body');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('text_intros', function (Blueprint $table) {
            $table->dropColumn('title_intro_en');
            $table->dropColumn('body_intro_en');
        });
        Schema::table('image_slider', function (Blueprint $table) {
            $table->dropColumn('title_slider_en');
            $table->dropColumn('body_en');
        });
        Schema::table('jasas', function (Blueprint $table) {
            $table->dropColumn('title_jasa_en');
            $table->dropColumn('body_jasa_en');
        });
        Schema::table('photo_gallery', function (Blueprint $table) {
            $table->dropColumn('title_photo_en');
            $table->dropColumn('body_en');
        });
        Schema::table('youtubes', function (Blueprint $table) {
            $table->dropColumn('title_video_en');
        });
        Schema::table('blog', function (Blueprint $table) {
            $table->dropColumn('title_en');
            $table->dropColumn('tanggal_en');
            $table->dropColumn('body_en');
        });
        Schema::table('visi_misis', function (Blueprint $table) {
            $table->dropColumn('title_en');
            $table->dropColumn('body_en');
        });
    }
}
