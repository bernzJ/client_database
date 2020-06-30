<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'website',
        'industry',
        'timezone',
        'fiscal_year',
        'employees_count',
        'project_type',
        'client_type',
        'active_projects',
        'referenceable',
        'opted_out',
        'financial',
        'hr',
        'sso',
        'test_site',
        'refresh_date',
        'logo',
        'address_1',
        'address_2',
        'address_lng_lat',
        'city',
        'zip',
        'country',
        'state',
        'lg_account_owner_oversight',
        'lg_sales_owner',
        'employee_groups',
        'notes',

    ];


    protected $dates = [
        'refresh_date',

    ];
    public $timestamps = false;

    protected $with = ['industry'];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/customers/' . $this->getKey());
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }
}
