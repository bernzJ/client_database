<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hr extends Model
{
    protected $table = 'hr';

    protected $fillable = [
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/hrs/'.$this->getKey());
    }
}
