<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    protected $fillable = [
        'name',

    ];


    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    // one to many.
    public function concurProducts()
    {
        return $this->hasMany(ConcurProduct::class);
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/segments/' . $this->getKey());
    }
}
