<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->integer('section_id');
            $table->string('title_pt')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_es')->nullable();
            $table->text('details_pt')->nullable();
            $table->text('details_en')->nullable();
            $table->text('details_es')->nullable();
            $table->text('code')->nullable();
            $table->string('file_pt')->nullable();
            $table->string('file_en')->nullable();
            $table->string('file_es')->nullable();
            $table->tinyInteger('video_type')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('link_url')->nullable();
            $table->string('icon')->nullable();
            $table->date('expire_date')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->integer('visits');
            $table->integer('row_no');
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
        Schema::dropIfExists('banners');
    }
}
