<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'Image_Main',
        'Image',
        'ID_Type',
        'BestSeller',
        'Status',
        'Cost',
        'Detail',
        'Rates',
    ];

    public function evaluate()
    {
        return $this->hasMany(Evaluates::class);
    }

    public function type()
    {
        return $this->belongsTo(Types::class);
    }

    public function category()
    {
        return $this->belongsToMany(Categories::class);
    }

    public function invoice()
    {
        return $this->belongsToMany(Invoices::class);
    }

    public function booking()
    {
        return $this->belongsToMany(Bookings::class);
    }

    public function table()
    {
        return $this->belongsToMany(Foods::class);
    }
}
