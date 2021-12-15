<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decisions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->tinyInteger('sex')->nullable();
            $table->string('age')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('note')->nullable();
            $table->date('decision_date')->nullable();
            $table->date('status_date')->nullable();
            $table->date('visit_date')->nullable();
            $table->integer('status_id')->nullable()->default('1');
            $table->integer('group_id')->nullable();
            $table->integer('pastor_id')->nullable();
            $table->integer('place_id')->nullable();
            $table->integer('member_id')->nullable();
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
        Schema::dropIfExists('decisions');
    }
}
