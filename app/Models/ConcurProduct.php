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
    protected $with = ['segment'];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    // one to many
    public function segment()
    {
        return $this->belongsTo(Segment::class);
    }

    // many to many.
    public function customer()
    {
        return $this->BelongsToMany(Customer::class);
    }
    public function globalFootprint()
    {
        return $this->BelongsToMany(GlobalFootprint::class);
    }
    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/concur-products/' . $this->getKey());
    }
}
