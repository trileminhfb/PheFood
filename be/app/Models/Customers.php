<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customers extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'Image',
        'Phone',
        'Birth',
        'Status',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
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
