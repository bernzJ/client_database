<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryGlobalFootprint extends Model
{
    protected $table = 'country_global_footprint';

    protected $fillable = [
        'global_footprint_id',
        'country_id',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/country-global-footprints/'.$this->getKey());
    }
}
