<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordToken extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id', 'token', 'expires_at', 'used'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}