<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcurProductGlobalFootprint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concur_product_global_footprint', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('global_footprint_id');
            $table->unsignedInteger('concur_product_id');

            $table->foreign('global_footprint_id')->references('id')->on('global_footprint')->onDelete('cascade');
            $table->foreign('concur_product_id')->references('id')->on('concur_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concur_product_global_footprint');
    }
}
