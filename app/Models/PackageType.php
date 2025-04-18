<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['type'];

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}