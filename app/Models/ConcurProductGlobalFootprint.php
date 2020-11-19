<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConcurProductGlobalFootprint extends Model
{
    protected $table = 'concur_product_global_footprint';

    protected $fillable = [
        'global_footprint_id',
        'concur_product_id',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/concur-product-global-footprints/'.$this->getKey());
    }
}
