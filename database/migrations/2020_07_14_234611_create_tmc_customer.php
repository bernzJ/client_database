<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTmcCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmc_customer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tmc_id');
            $table->unsignedInteger('customer_id');

            $table->foreign('tmc_id')->references('id')->on('tmc')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tmc_customer');
    }
}
