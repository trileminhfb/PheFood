<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_Customer',
        'Time',
        'Amount',
        'Status',
    ];

    public function food()
    {
        return $this->belongsToMany(Foods::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }
}
