<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;

    protected $fillable = ['username', 'email', 'password', 'role_id'];
    
    protected $hidden = ['password'];

    public function setPassword($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function activePasswordToken()
    {
        return $this->hasOne(PasswordToken::class)->where('used', false);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}