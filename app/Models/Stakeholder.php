<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stakeholder extends Model
{
    protected $fillable = [
        'role',
        'name',
        'email',
        'phone',
        'contact_method_id',
        'timezone_id',
        'customer_id',

    ];


    protected $with = ['customer', 'timezone', 'contactMethod'];
    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function timezone()
    {
        return $this->belongsTo(Timezone::class);
    }
    public function contactMethod(){
        return $this->belongsTo(ContactMethod::class);
    }
    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/stakeholders/' . $this->getKey());
    }
}
