<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConcurProductCustomer extends Model
{
    protected $table = 'concur_product_customer';

    protected $fillable = [
        'concur_product_id',
        'customer_id',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/concur-product-customers/'.$this->getKey());
    }
}
