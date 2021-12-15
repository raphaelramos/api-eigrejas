<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
            $table->tinyInteger('view_status')->default(false);
            $table->tinyInteger('add_status')->default(false);
            $table->tinyInteger('edit_status')->default(false);
            $table->tinyInteger('delete_status')->default(false);
            $table->tinyInteger('active_status')->default(false);

            $table->tinyInteger('content_status')->default(false);
            $table->tinyInteger('analytics_status')->default(false);
            $table->tinyInteger('inbox_status')->default(false);
            $table->tinyInteger('newsletter_status')->default(false);
            $table->tinyInteger('calendar_status')->default(false);
            $table->tinyInteger('banners_status')->default(false);
            $table->tinyInteger('settings_status')->default(false);
            $table->tinyInteger('webmaster_status')->default(false);


            $table->string('data_sections')->nullable();

            $table->tinyInteger('home_status')->default(false);
            $table->text('home_links')->nullable();
            $table->longText('home_details_pt')->nullable();
            $table->longText('home_details_en')->nullable();
            $table->longText('home_details_es')->nullable();

            $table->tinyInteger('panel_status')->default(false);
            $table->string('panel_sections')->nullable();

            $table->tinyInteger('only_assigned')->default(false);
            $table->string('places_id')->nullable();
            $table->string('groups_id')->nullable();

            $table->tinyInteger('status')->default(true);

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
        Schema::dropIfExists('permissions');
    }
}
