<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredidents extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'Unit',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouses::class);
    }

    public function warehouse_invoice()
    {
        return $this->belongsTo(Warehouses_Invoices::class);
    }
}
