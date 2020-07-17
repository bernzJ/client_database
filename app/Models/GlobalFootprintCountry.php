<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalFootprintCountry extends Model
{
    protected $table = 'global_footprint_country';

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
        return url('/admin/global-footprint-countries/'.$this->getKey());
    }
}
