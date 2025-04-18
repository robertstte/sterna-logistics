<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
    public $timestamps = false;

    protected $fillable = ['type'];

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }
}