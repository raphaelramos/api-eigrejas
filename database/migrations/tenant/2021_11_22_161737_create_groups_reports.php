<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('group_id');
            $table->date('date');
            $table->integer('members')->nullable();
            $table->integer('guests')->nullable();
            $table->integer('kids')->nullable();
            $table->integer('baptized')->nullable();
            $table->decimal('offer')->nullable();
            $table->string('note')->nullable();
            $table->string('theme1')->nullable();
            $table->string('theme2')->nullable();
            $table->string('theme3')->nullable();
            $table->string('theme4')->nullable();
            $table->string('theme5')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('groups_reports');
    }
}
