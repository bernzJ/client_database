<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiscalYear extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiscal_year', function (Blueprint $table) {
            $table->increments('id');
            $table->date('begin');
            $table->date('end')->nullable();
            $table->date('month_end_close_period')->nullable();
            $table->date('quarterly_close_cycle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiscal_year');
    }
}
