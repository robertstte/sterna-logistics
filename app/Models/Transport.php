<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    public $timestamps = false;

    protected $fillable = ['type_id', 'cost_per_km', 'capacity', 'license_plate', 'country_id'];

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function transportType()
    {
        return $this->belongsTo(TransportType::class, 'type_id');
    }
}