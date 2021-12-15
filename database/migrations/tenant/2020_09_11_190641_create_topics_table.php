<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('title_pt')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_es')->nullable();
            $table->longText('details_pt')->nullable();
            $table->longText('details_en')->nullable();
            $table->longText('details_es')->nullable();
            $table->dateTime('date')->nullable();
            $table->dateTime('expire_date')->nullable();
            $table->tinyInteger('video_type')->nullable();
            $table->string('photo_file')->nullable();
            $table->string('attach_file')->nullable();
            $table->text('video_file')->nullable();
            $table->string('audio_file')->nullable();
            $table->string('icon')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->integer('visits');
            $table->integer('webmaster_id');
            $table->integer('section_id');
            $table->integer('row_no');
            $table->string('seo_title_pt')->nullable();
            $table->string('seo_title_en')->nullable();
            $table->string('seo_title_es')->nullable();
            $table->string('seo_description_pt')->nullable();
            $table->string('seo_description_en')->nullable();
            $table->string('seo_description_es')->nullable();
            $table->string('seo_keywords_pt')->nullable();
            $table->string('seo_keywords_en')->nullable();
            $table->string('seo_keywords_es')->nullable();
            $table->string('seo_url_slug_pt')->nullable();
            $table->string('seo_url_slug_en')->nullable();
            $table->string('seo_url_slug_es')->nullable();
            $table->integer('place_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('topics');
    }
}
