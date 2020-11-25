<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;

class Customer extends Model implements HasMedia
{

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    public function registerMediaCollections()
    {
        $this->addMediaCollection('logos')->accepts('image/*')->maxNumberOfFiles(1);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->autoRegisterThumb200();
    }
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

    //@TODO: add the other dates?
    protected $dates = [
        'refresh_date',

    ];
    protected $with = [
        'industry',
        'timezone',
        'projectType',
        'projectScope',
        'clientType',
        'country',
        'state',
        'concurProduct',
        'fiscalYear',
        'financial',
        'hr',
        'employeeGroup',
        'tmc',
    ];
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
    public function fiscalYear()
    {
        return $this->belongsTo(FiscalYear::class);
    }
    public function financial()
    {
        return $this->belongsTo(Financial::class);
    }
    public function projectScope()
    {
        return $this->belongsTo(ProjectScope::class);
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
    public function employeeGroup()
    {
        return $this->belongsTo(EmployeeGroup::class);
    }
    // reverse, omit in with
    public function note()
    {
        return $this->belongsTo(Note::class);
    }
    public function hr()
    {
        return $this->belongsTo(Hr::class);
    }
    public function creditCards()
    {
        return $this->hasMany(CreditCard::class);
    }
    // many to many.
    public function stakeholder()
    {
        return $this->BelongsToMany(Stakeholder::class);
    }
    public function concurProduct()
    {
        return $this->BelongsToMany(ConcurProduct::class);
    }
    public function tmc()
    {
        return $this->BelongsToMany(Tmc::class);
    }

    // has one throu
    public function segment()
    {
        return $this->hasOneThrough(Segment::class, ConcurProduct::class);
    }
}
