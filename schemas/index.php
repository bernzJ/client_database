<?php

// industries
Schema::create('industries', function (Blueprint $table) {
  $table->increments('id');
  $table->string('name');
});

// timezones
Schema::create('timezones', function (Blueprint $table) {
  $table->increments('id');
  $table->string('name');
});

// fiscal_year
Schema::create('fiscal_year', function (Blueprint $table) {
  $table->increments('id');
  $table->date('begin');
  $table->date('end')->nullable();
  $table->date('month_end_close_period')->nullable();
  $table->date('quarterly_close_cycle')->nullable();
});

// project_type
Schema::create('project_type', function (Blueprint $table) {
  $table->increments('id');
  $table->string('name');
});

// client_type
Schema::create('client_type', function (Blueprint $table) {
  $table->increments('id');
  $table->string('name');
});

// financial
Schema::create('financial', function (Blueprint $table) {
  $table->increments('id');
  $table->string('platform');
});

// hr
Schema::create('hr', function (Blueprint $table) {
  $table->increments('id');
  $table->string('system');
});

// countries
Schema::create('countries', function (Blueprint $table) {
  $table->increments('id');
  $table->string('name');
  $table->string('two_char_country_code');
  $table->string('three_char_country_code');
});

// employee_group
Schema::create('employee_group', function (Blueprint $table) {
  $table->increments('id');
  $table->string('name');
});

// notes
Schema::create('notes', function (Blueprint $table) {
  $table->increments('id');
  $table->string('company_overview')->nullable();
  $table->string('company_culture')->nullable();
  $table->string('strategic_goals')->nullable();
  $table->string('compliance')->nullable();
});

// frequency
Schema::create('frequency', function (Blueprint $table) {
  $table->increments('id');
  $table->string('name');
});

// liability
Schema::create('liability', function (Blueprint $table) {
  $table->increments('id');
  $table->string('name');
});

// card_programs
Schema::create('card_programs', function (Blueprint $table) {
  $table->increments('id');
  $table->string('name');
});

// payroll
Schema::create('payroll', function (Blueprint $table) {
  $table->increments('id');
  $table->date('cutoff')->nullable();
  $table->unsignedInteger('frequency_id');

  // one to one
  $table->foreign('frequency_id')->references('id')->on('frequency')->onDelete('cascade');
});

// state
Schema::create('state', function (Blueprint $table) {
  $table->increments('id');
  $table->string('abbreviation');
  $table->string('name');
  $table->unsignedInteger('country_id');

  // one to one
  $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
});

// customers
Schema::create('customers', function (Blueprint $table) {
  $table->increments('id');
  $table->string('name');
  $table->string('website')->nullable();
  $table->unsignedInteger('industry_id');
  $table->unsignedInteger('timezone_id');
  $table->unsignedInteger('fiscal_year_id')->nullable();
  $table->integer('employees_count')->default(0);
  $table->unsignedInteger('project_type_id');
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
  $table->unsignedInteger('state_id');
  $table->string('lg_account_owner_oversight')->nullable();
  $table->string('lg_sales_owner')->nullable();
  $table->unsignedInteger('employee_group_id')->nullable();
  $table->unsignedInteger('notes_id')->nullable();

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
  $table->foreign('notes_id')->references('id')->on('notes')->onDelete('cascade');
});

// cards
Schema::create('cards', function (Blueprint $table) {
  $table->increments('id');
  $table->unsignedInteger('customer_id');
  $table->string('bank_name')->nullable();
  $table->string('payment_type_name')->nullable();
  $table->unsignedInteger('card_program_type_id')->nullable();
  $table->unsignedInteger('liability_id')->nullable();
  $table->string('statement_cycle')->nullable();
  $table->boolean('cc_feed')->default(false);
  $table->string('batch_configuration')->nullable();
  $table->string('rebate')->nullable();

  // one to one
  $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
  $table->foreign('liability_id')->references('id')->on('liability')->onDelete('cascade');
  $table->foreign('card_program_type_id')->references('id')->on('card_programs')->onDelete('cascade');

});
