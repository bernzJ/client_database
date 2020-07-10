<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcurProductCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concur_product_customer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('concur_product_id');
            $table->unsignedInteger('customer_id');

            $table->foreign('concur_product_id')->references('id')->on('concur_products')->onDelete('cascade');
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
        Schema::dropIfExists('concur_product_customer');
    }
}
