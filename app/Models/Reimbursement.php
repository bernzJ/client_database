<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reimbursement extends Model
{
    protected $table = 'reimbursement';

    protected $fillable = [
        'type',

    ];


    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    public function globalFootprint()
    {
        return $this->hasMany(GlobalFootprint::class);
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/reimbursements/' . $this->getKey());
    }
}
