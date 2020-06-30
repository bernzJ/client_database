<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [
        'name',

    ];


    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    public function Industry()
    {
        return $this->hasMany(Industry::class);
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/industries/' . $this->getKey());
    }

    /* ************************ RELATIONS ************************* */

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
