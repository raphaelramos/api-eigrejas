<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {
            $table->id();
            $table->integer('topic_id');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('title_pt')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_es')->nullable();
            $table->text('details_pt')->nullable();
            $table->text('details_en')->nullable();
            $table->text('details_es')->nullable();
            $table->tinyInteger('icon');
            $table->tinyInteger('status')->default('1');
            $table->integer('row_no');
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
        Schema::dropIfExists('maps');
    }
}
