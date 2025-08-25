<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customers extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    const OTP_EXPIRE_MINUTES = 15;

    protected $fillable = [
        'name',
        'email',
        'Image',
        'Phone',
        'Birth',
        'OTP',
        'otp_expires_at',
        'is_Active',
        'Status',
        'Points',
        'password',
        'remember_token',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'otp_expires_at' => 'datetime',
        'password' => 'hashed',
        'is_Active' => 'integer',
        'Status' => 'integer',
        'Points' => 'integer',
    ];

    public function booking()
    {
        return $this->hasMany(Bookings::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoices::class);
    }

    public function evaluate()
    {
        return $this->hasMany(Evaluates::class);
    }
}
