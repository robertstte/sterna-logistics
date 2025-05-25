<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'package_type_id',
        'weight',
        'transport_id',
        'origin',
        'destination',
        'departure_location',
        'arrival_location',
        'departure_date',
        'arrival_date',
        'description',
        'observations',
        'status'
    ];

    protected $casts = [
        'departure_date' => 'date',
        'arrival_date' => 'date',
        'weight' => 'float'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
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

    public function departureLocation()
    {
        return $this->belongsTo(CountryLocation::class, 'departure_location');
    }

    public function arrivalLocation()
    {
        return $this->belongsTo(CountryLocation::class, 'arrival_location');
    }
} 