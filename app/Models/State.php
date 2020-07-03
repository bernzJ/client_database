<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'state';

    protected $fillable = [
        'abbreviation',
        'name',
        'country_id',

    ];


    protected $dates = [];
    protected $with = ['country'];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/states/' . $this->getKey());
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
