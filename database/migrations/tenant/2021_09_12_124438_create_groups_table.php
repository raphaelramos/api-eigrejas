<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->integer('day')->nullable();
            $table->time('schedule')->nullable();
            $table->integer('day2')->nullable();
            $table->time('schedule2')->nullable();
            $table->date('opening_date')->nullable();
            $table->date('finish_date')->nullable();
            $table->integer('place_id')->nullable();
            $table->integer('network_id')->nullable();
            $table->integer('pastor_id')->nullable();
            $table->integer('supervisor_id')->nullable();
            $table->integer('leader_id')->nullable();
            $table->integer('leader2_id')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
