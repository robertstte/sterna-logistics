<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = false;

    protected $fillable = ['status', 'color'];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}