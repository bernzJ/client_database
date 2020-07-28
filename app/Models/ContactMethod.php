<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMethod extends Model
{
    protected $table = 'contact_method';

    protected $fillable = [
        'name',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/contact-methods/'.$this->getKey());
    }
}
