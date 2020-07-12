<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FiscalYear extends Model
{
    protected $table = 'fiscal_year';

    protected $fillable = [
        'begin',
        'end',
        'month_end_close_period',
        'quarterly_close_cycle',

    ];


    protected $dates = [
        'begin',
        'end',
        'month_end_close_period',
        'quarterly_close_cycle',

    ];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/fiscal-years/' . $this->getKey());
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
