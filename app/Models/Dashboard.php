<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'dashboard_stats';

    protected $guarded = ['*'];

    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url', 'customer_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/dashboards/' . $this->getKey());
    }
    public function getCustomerUrlAttribute()
    {
        return url('admin/customers/' . $this->getKey() . '/edit');
    }
}
