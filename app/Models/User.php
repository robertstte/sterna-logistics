<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable; // Esto permite que el modelo implemente la funcionalidad de autenticación

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
