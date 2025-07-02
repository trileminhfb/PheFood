<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouses_Invoices extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_Ingredient',
        'Amount',
        'Cast',
    ];
}
