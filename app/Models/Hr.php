<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hr extends Model
{
    protected $table = 'hr';

    protected $fillable = [
        'system',

    ];


    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/hrs/' . $this->getKey());
    }
}
