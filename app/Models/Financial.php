<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    protected $table = 'financial';

    protected $fillable = [
        'platform',

    ];


    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/financials/' . $this->getKey());
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
