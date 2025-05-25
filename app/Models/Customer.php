<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id', 'name', 'email', 'address', 'phone', 'country_id', 'customer_type_id', 'plan_id']; 
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function customerType()
    {
        return $this->belongsTo(CustomerType::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}