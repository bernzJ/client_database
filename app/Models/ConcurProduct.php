<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConcurProduct extends Model
{
    protected $fillable = [
        'product',
        'segment_id',

    ];


    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/concur-products/' . $this->getKey());
    }

    // many to many.
    public function customer()
    {
        return $this->BelongsToMany(Customer::class);
    }

    public function segment()
    {
        return $this->hasMany(Segment::class);
    }
}
