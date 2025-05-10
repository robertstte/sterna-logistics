<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryLocation extends Model
{
	public $timestamps = false;

	protected $fillable = ['name', 'latitude', 'longitude', 'type_id', 'country_id'];

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function transportType()
	{
		return $this->belongsTo(TransportType::class);
	}
}