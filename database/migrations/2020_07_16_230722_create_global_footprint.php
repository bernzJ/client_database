<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalFootprint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_footprint', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reimbursement_id');

            $table->foreign('reimbursement_id')->references('id')->on('reimbursement')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('global_footprint');
    }
}
