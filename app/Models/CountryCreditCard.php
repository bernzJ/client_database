<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryCreditCard extends Model
{
    protected $table = 'country_credit_card';

    protected $fillable = [
        'credit_card_id',
        'country_id',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/country-credit-cards/'.$this->getKey());
    }
}
