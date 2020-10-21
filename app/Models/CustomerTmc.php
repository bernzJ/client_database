<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerTmc extends Model
{
    protected $table = 'customer_tmc';

    protected $fillable = [
        'tmc_id',
        'customer_id',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/customer-tmcs/'.$this->getKey());
    }
}
