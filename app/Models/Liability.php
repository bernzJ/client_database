<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liability extends Model
{
    protected $table = 'liability';

    protected $fillable = [
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/liabilities/'.$this->getKey());
    }
}
