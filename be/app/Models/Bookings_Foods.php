<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings_Foods extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_Food',
        'ID_Booking',
        'Amount',
    ];
}
