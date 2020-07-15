<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tmc extends Model
{
    protected $table = 'tmc';

    protected $fillable = [
        'name',
        'comment',

    ];


    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    // many to many.
    public function customer()
    {
        return $this->BelongsToMany(Customer::class);
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tmcs/' . $this->getKey());
    }
}
