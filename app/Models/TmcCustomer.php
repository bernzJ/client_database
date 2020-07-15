<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TmcCustomer extends Model
{
    protected $table = 'tmc_customer';

    protected $fillable = [
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tmc-customers/'.$this->getKey());
    }
}
