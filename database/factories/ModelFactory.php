<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,

    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Customer::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Customer::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'website' => $faker->sentence,
        'industry' => $faker->randomNumber(5),
        'timezone' => $faker->randomNumber(5),
        'fiscal_year' => $faker->randomNumber(5),
        'employees_count' => $faker->randomNumber(5),
        'project_type' => $faker->randomNumber(5),
        'client_type' => $faker->randomNumber(5),
        'active_projects' => $faker->boolean(),
        'referenceable' => $faker->boolean(),
        'opted_out' => $faker->boolean(),
        'financial' => $faker->randomNumber(5),
        'hr' => $faker->randomNumber(5),
        'sso' => $faker->boolean(),
        'test_site' => $faker->boolean(),
        'refresh_date' => $faker->date(),
        'logo' => $faker->sentence,
        'address_1' => $faker->sentence,
        'address_2' => $faker->sentence,
        'address_lng_lat' => $faker->sentence,
        'city' => $faker->sentence,
        'zip' => $faker->sentence,
        'country' => $faker->randomNumber(5),
        'state' => $faker->randomNumber(5),
        'lg_account_owner_oversight' => $faker->sentence,
        'lg_sales_owner' => $faker->sentence,
        'employee_group' => $faker->randomNumber(5),
        'notes' => $faker->randomNumber(5),


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Industry::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ClientType::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Industry::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Timezone::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\FiscalYear::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\FiscalYear::class, static function (Faker\Generator $faker) {
    return [
        'begin' => $faker->date(),
        'end' => $faker->date(),
        'month_end_close_period' => $faker->date(),
        'quarterly_close_cycle' => $faker->date(),


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ProjectType::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ClientType::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Financial::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Hr::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Country::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\EmployeeGroup::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Note::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Frequency::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CardProgram::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Payroll::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\State::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ProjectType::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Customer::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'website' => $faker->sentence,
        'industry_id' => $faker->randomNumber(5),
        'timezone_id' => $faker->randomNumber(5),
        'fiscal_year_id' => $faker->randomNumber(5),
        'employees_count' => $faker->randomNumber(5),
        'project_type_id' => $faker->randomNumber(5),
        'client_type_id' => $faker->randomNumber(5),
        'active_projects' => $faker->boolean(),
        'referenceable' => $faker->boolean(),
        'opted_out' => $faker->boolean(),
        'financial_id' => $faker->randomNumber(5),
        'hr_id' => $faker->randomNumber(5),
        'sso' => $faker->boolean(),
        'test_site' => $faker->boolean(),
        'refresh_date' => $faker->date(),
        'logo' => $faker->sentence,
        'address_1' => $faker->sentence,
        'address_2' => $faker->sentence,
        'address_lng_lat' => $faker->sentence,
        'city' => $faker->sentence,
        'zip' => $faker->sentence,
        'country_id' => $faker->randomNumber(5),
        'state_id' => $faker->randomNumber(5),
        'lg_account_owner_oversight' => $faker->sentence,
        'lg_sales_owner' => $faker->sentence,
        'employee_group_id' => $faker->randomNumber(5),
        'notes_id' => $faker->randomNumber(5),


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Timezone::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ProjectType::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Country::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'two_char_country_code' => $faker->sentence,
        'three_char_country_code' => $faker->sentence,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\State::class, static function (Faker\Generator $faker) {
    return [
        'abbreviation' => $faker->sentence,
        'name' => $faker->firstName,
        'country_id' => $faker->randomNumber(5),


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ConcurProduct::class, static function (Faker\Generator $faker) {
    return [
        'customer_id' => $faker->randomNumber(5),
        'product' => $faker->sentence,
        'segment_id' => $faker->randomNumber(5),


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ConcurProductCustomer::class, static function (Faker\Generator $faker) {
    return [
        'concur_product_id' => $faker->randomNumber(5),
        'customer_id' => $faker->randomNumber(5),


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Financial::class, static function (Faker\Generator $faker) {
    return [
        'platform' => $faker->sentence,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ConcurProduct::class, static function (Faker\Generator $faker) {
    return [
        'product' => $faker->sentence,
        'segment_id' => $faker->randomNumber(5),


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ConcurProduct::class, static function (Faker\Generator $faker) {
    return [
        'product' => $faker->sentence,
        'segment_name' => $faker->sentence,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Segment::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Segment::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ConcurProduct::class, static function (Faker\Generator $faker) {
    return [
        'product' => $faker->sentence,
        'segment_id' => $faker->randomNumber(5),


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Segment::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'concur_product_id' => $faker->randomNumber(5),


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ConcurProduct::class, static function (Faker\Generator $faker) {
    return [
        'product' => $faker->sentence,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Note::class, static function (Faker\Generator $faker) {
    return [
        'company_overview' => $faker->sentence,
        'company_culture' => $faker->sentence,
        'strategic_goals' => $faker->sentence,
        'compliance' => $faker->sentence,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Note::class, static function (Faker\Generator $faker) {
    return [
        'company_culture' => $faker->text(),
        'strategic_goals' => $faker->text(),
        'compliance' => $faker->text(),


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Hr::class, static function (Faker\Generator $faker) {
    return [
        'system' => $faker->sentence,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\EmployeeGroup::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\EmployeeGroup::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\EmployeeGroup::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Tmc::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TmcCustomer::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Tmc::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'comment' => $faker->sentence,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PaymentMethod::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Liability::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\CreditCard::class, static function (Faker\Generator $faker) {
    return [
        'bank_name' => $faker->sentence,
        'payment_type' => $faker->sentence,
        'statement_cycle' => $faker->sentence,
        'liability_id' => $faker->randomNumber(5),
        'cc_feed' => $faker->boolean(),
        'payment_method_id' => $faker->randomNumber(5),
        'batch_config' => $faker->sentence,
        'rebate' => $faker->sentence,
        'card_program_type_id' => $faker->sentence,
        'customer_id' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PaymentMethod::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Reimbursement::class, static function (Faker\Generator $faker) {
    return [
        'type' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\GlobalFootprint::class, static function (Faker\Generator $faker) {
    return [
        'reimbursement_id' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\GlobalFootprintCountry::class, static function (Faker\Generator $faker) {
    return [
        'global_footprint_id' => $faker->randomNumber(5),
        'country_id' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ContactMethod::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ContactMethod::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Stakeholder::class, static function (Faker\Generator $faker) {
    return [
        'role' => $faker->sentence,
        'name' => $faker->firstName,
        'email' => $faker->email,
        'phone' => $faker->sentence,
        'contact_method_id' => $faker->randomNumber(5),
        'timezone_id' => $faker->randomNumber(5),
        'customer_id' => $faker->randomNumber(5),
        
        
    ];
});
