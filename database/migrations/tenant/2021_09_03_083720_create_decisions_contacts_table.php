<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecisionsContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decisions_contacts', function (Blueprint $table) {
            $table->id();
            $table->integer('decision_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('contact')->nullable();
            $table->tinyInteger('type_contact')->nullable();
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
        Schema::dropIfExists('decisions_contacts');
    }
}
