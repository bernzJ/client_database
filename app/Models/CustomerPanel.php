<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerPanel extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'name',
        'website',
        'industry_id',
        'timezone_id',
        'fiscal_year_id',
        'employees_count',
        'project_type_id',
        'project_scope_id',
        'client_type_id',
        'active_projects',
        'referenceable',
        'opted_out',
        'financial_id',
        'hr_id',
        'sso',
        'test_site',
        'refresh_date',
        'address_1',
        'address_2',
        'address_lng_lat',
        'city',
        'zip',
        'country_id',
        'state_id',
        'lg_account_owner_oversight',
        'lg_sales_owner',
        'employee_group_id',
    ];


    protected $dates = [

    ];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/customer-panels/'.$this->getKey());
    }
}
