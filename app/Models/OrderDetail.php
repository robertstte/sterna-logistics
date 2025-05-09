<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $timestamps = false;

    protected $fillable = ['order_id', 'origin', 'destination', 'departure_date', 'arrival_date', 'departure_location', 'arrival_location', 'distance_km', 'transport_id', 'total_cost', 'weight', 'package_type_id', 'description', 'observations'];
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function packageType()
    {
        return $this->belongsTo(PackageType::class);
    }

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }

    public function originCountry()
    {
        return $this->belongsTo(Country::class, 'origin');
    }

    public function destinationCountry()
    {
        return $this->belongsTo(Country::class, 'destination');
    }
}