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
    protected $with = ['industry', 'timezone', 'projectType', 'clientType', 'country', 'state'];
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
    public function timezone()
    {
        return $this->belongsTo(Timezone::class);
    }
    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }
    public function clientType()
    {
        return $this->belongsTo(ClientType::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
