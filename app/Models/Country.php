<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['name', 'code'];

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }

    public function transport()
    {
        return $this->hasMany(Transport::class);
    }

    public function originOrderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'origin');
    }

    public function destinationOrderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'destination');
    }

    public function locations()
    {
        return $this->hasMany(CountryLocation::class);
    }
}