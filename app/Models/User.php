<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role_id',
        'google_id',
        'avatar',
        'notifications'
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'preferences' => 'array',
    ];

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
