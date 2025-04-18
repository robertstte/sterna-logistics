<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id', 'status_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function orderDetail()
    {
        return $this->hasOne(OrderDetail::class);
    }
}