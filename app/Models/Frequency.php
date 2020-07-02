<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frequency extends Model
{
    protected $table = 'frequency';

    protected $fillable = [
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/frequencies/'.$this->getKey());
    }
}
