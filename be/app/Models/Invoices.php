<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_Table',
        'ID_User',
        'ID_Customer',
        'ID_Sale',
        'Total',
        'Status',
    ];
}
