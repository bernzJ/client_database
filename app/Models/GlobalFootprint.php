<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalFootprint extends Model
{
    protected $table = 'global_footprint';

    protected $fillable = [
        'reimbursement_id',

    ];


    protected $dates = [];
    protected $with = ['reimbursement', 'country', 'concurProduct'];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    public function reimbursement()
    {
        return $this->hasMany(Reimbursement::class);
    }
    // many to many.
    public function country()
    {
        return $this->BelongsToMany(Country::class);
    }
    public function concurProduct()
    {
        return $this->BelongsToMany(ConcurProduct::class);
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/global-footprints/' . $this->getKey());
    }
}
