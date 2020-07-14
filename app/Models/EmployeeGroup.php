<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeGroup extends Model
{
    protected $table = 'employee_group';

    protected $fillable = [
        'name',

    ];


    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/employee-groups/' . $this->getKey());
    }
}
