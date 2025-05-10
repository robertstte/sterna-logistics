<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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