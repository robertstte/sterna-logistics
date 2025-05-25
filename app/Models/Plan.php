<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name', 'description', 'price', 'features'];

    protected $casts = [
        'features' => 'array',
        'price' => 'decimal:2'
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
} 