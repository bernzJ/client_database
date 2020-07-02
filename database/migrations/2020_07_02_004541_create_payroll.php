<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayroll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll', function (Blueprint $table) {
            $table->increments('id');
            $table->date('cutoff')->nullable();
            $table->unsignedInteger('frequency_id');

            // one to one
            $table->foreign('frequency_id')->references('id')->on('frequency')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payroll');
    }
}
