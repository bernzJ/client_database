<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStakeholders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stakeholders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->unsignedInteger('contact_method_id')->nullable();
            $table->unsignedInteger('timezone_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();


            $table->foreign('contact_method_id')->references('id')->on('contact_method')->onDelete('cascade');
            $table->foreign('timezone_id')->references('id')->on('timezones')->onDelete('cascade');
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
        Schema::dropIfExists('stakeholders');
    }
}
