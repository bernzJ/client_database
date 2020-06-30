<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model
{
    protected $table = 'customers';

    protected $guarded = ['*'];

    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url'];


    /** TEST */
    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->selectRaw('id, COUNT(id) AS total_clients')
            ->selectRaw('COUNT(CASE WHEN active_projects = 1 THEN 1 ELSE NULL END) AS total_active_projects')
            ->groupByRaw('id');
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/dashboards/' . $this->getKey());
    }
}
