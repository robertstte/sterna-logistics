<?php

namespace App\Models;

class TransportType extends Model
{
	public $timestamps = false;

	protected $fillable = ['type'];

	public function countryLocation()
	{
		return $this->hasMany(CountryLocation::class);
	}

	public function transport()
	{
		return $this->hasMany(Transport::class);
	}
}