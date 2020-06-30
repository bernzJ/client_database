<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('website')->nullable();
            $table->integer('industry');
            $table->foreign('industry')->references('id')->on('industries')->onDelete('cascade');
            $table->integer('timezone');
            $table->integer('fiscal_year');
            $table->integer('employees_count')->default(0);
            $table->integer('project_type');
            $table->integer('client_type');
            $table->boolean('active_projects')->default(false);
            $table->boolean('referenceable')->default(false);
            $table->boolean('opted_out')->default(false);
            $table->integer('financial');
            $table->integer('hr');
            $table->boolean('sso')->default(false);
            $table->boolean('test_site')->default(false);
            $table->date('refresh_date');
            $table->string('logo');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('address_lng_lat');
            $table->string('city');
            $table->string('zip');
            $table->integer('country');
            $table->integer('state');
            $table->string('lg_account_owner_oversight');
            $table->string('lg_sales_owner');
            $table->integer('employee_groups');
            $table->integer('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
