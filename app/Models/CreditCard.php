<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $fillable = [
        'bank_name',
        'payment_type',
        'statement_cycle',
        'liability_id',
        'cc_feed',
        'payment_method_id',
        'batch_config',
        'rebate',
        'card_program_type_id',
        'customer_id',

    ];

    protected $with = [
        'liability',
        'paymentMethod',
        'customer',
        'country',
    ];
    protected $dates = [];
    public $timestamps = false;

    protected $appends = ['resource_url'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function liability()
    {
        return $this->belongsTo(Liability::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    // many to many.
    public function country()
    {
        return $this->BelongsToMany(Country::class);
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/credit-cards/' . $this->getKey());
    }
}
