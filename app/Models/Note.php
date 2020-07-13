<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'company_culture',
        'strategic_goals',
        'compliance',

    ];


    protected $dates = [];
    protected $with = ['customer'];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/notes/' . $this->getKey());
    }
}
