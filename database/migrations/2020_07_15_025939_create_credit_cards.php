<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditCards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank_name');
            $table->string('payment_type');
            $table->string('statement_cycle')->nullable();
            $table->unsignedInteger('liability_id');
            $table->boolean('cc_feed')->default(false);
            $table->unsignedInteger('payment_method_id');
            $table->string('batch_config');
            $table->string('rebate');
            $table->unsignedInteger('card_program_id');
            $table->unsignedInteger('customer_id');


            $table->foreign('liability_id')->references('id')->on('liabilities')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
            $table->foreign('card_program_id')->references('id')->on('card_programs')->onDelete('cascade');
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
        Schema::dropIfExists('credit_cards');
    }
}
