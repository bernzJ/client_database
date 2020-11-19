<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryCreditCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_credit_card', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('credit_card_id');
            $table->unsignedInteger('country_id');

            $table->foreign('credit_card_id')->references('id')->on('credit_cards')->onDelete('cascade');
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
        Schema::dropIfExists('country_credit_card');
    }
}
