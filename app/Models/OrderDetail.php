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

    public function country()
    {
        return $this->belongsTo(Country::class, 'origin');
    }


    public function originCountry()
    {
        return $this->belongsTo(Country::class, 'origin');
    }


    public function destinationCountry()
    {
        return $this->belongsTo(Country::class, 'destination');
    }
   
    public function departureLocation()
    {
        return $this->belongsTo(CountryLocation::class, 'departure_location');
    }

    public function arrivalLocation()
    {
        return $this->belongsTo(CountryLocation::class, 'arrival_location');
    }

    
    
}