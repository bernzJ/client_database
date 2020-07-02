<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'website',
        'industry_id',
        'timezone_id',
        'fiscal_year_id',
        'employees_count',
        'project_type_id',
        'client_type_id',
        'active_projects',
        'referenceable',
        'opted_out',
        'financial_id',
        'hr_id',
        'sso',
        'test_site',
        'refresh_date',
        'logo',
        'address_1',
        'address_2',
        'address_lng_lat',
        'city',
        'zip',
        'country_id',
        'state_id',
        'lg_account_owner_oversight',
        'lg_sales_owner',
        'employee_groups_id',
        'notes_id',

    ];


    protected $dates = [
        'refresh_date',

    ];
    protected $with = ['industry'];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/customers/' . $this->getKey());
    }

    /* ************************ RELATIONS ************************* */

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }
}
