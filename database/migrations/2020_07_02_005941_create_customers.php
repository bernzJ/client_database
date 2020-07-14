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
            $table->unsignedInteger('industry_id');
            $table->unsignedInteger('timezone_id');
            $table->unsignedInteger('fiscal_year_id')->nullable();
            $table->integer('employees_count')->default(0);
            $table->unsignedInteger('project_type_id')->nullable();
            $table->unsignedInteger('client_type_id')->nullable();
            $table->boolean('active_projects')->default(false);
            $table->boolean('referenceable')->default(false);
            $table->boolean('opted_out')->default(false);
            $table->unsignedInteger('financial_id')->nullable();
            $table->unsignedInteger('hr_id')->nullable();
            $table->boolean('sso')->default(false);
            $table->boolean('test_site')->default(false);
            $table->date('refresh_date')->nullable();
            $table->string('logo')->nullable();
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('address_lng_lat');
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('state_id')->nullable();
            $table->string('lg_account_owner_oversight')->nullable();
            $table->string('lg_sales_owner')->nullable();
            $table->unsignedInteger('employee_group_id')->nullable();
            $table->unsignedInteger('note_id')->nullable();

            // one to one
            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');
            $table->foreign('timezone_id')->references('id')->on('timezones')->onDelete('cascade');
            $table->foreign('fiscal_year_id')->references('id')->on('fiscal_year')->onDelete('cascade');
            $table->foreign('project_type_id')->references('id')->on('project_type')->onDelete('cascade');
            $table->foreign('client_type_id')->references('id')->on('client_type')->onDelete('cascade');
            $table->foreign('financial_id')->references('id')->on('financial')->onDelete('cascade');
            $table->foreign('hr_id')->references('id')->on('hr')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('state')->onDelete('cascade');
            $table->foreign('employee_group_id')->references('id')->on('employee_group')->onDelete('cascade');
            $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');
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
