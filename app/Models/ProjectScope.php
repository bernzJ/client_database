<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectScope extends Model
{
    protected $table = 'project_scope';

    protected $fillable = [
        'name',

    ];


    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/project-scopes/' . $this->getKey());
    }
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
