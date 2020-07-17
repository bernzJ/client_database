<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalFootprintCountry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_footprint_country', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('global_footprint_id');
            $table->unsignedInteger('country_id');

            $table->foreign('global_footprint_id')->references('id')->on('global_footprint')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('global_footprint_country');
    }
}
