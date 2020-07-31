<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardProgram extends Model
{
    protected $fillable = [
        'name',

    ];


    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    public function creditCards()
    {
        return $this->hasMany(CreditCard::class);
    }
    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/card-programs/' . $this->getKey());
    }
}
