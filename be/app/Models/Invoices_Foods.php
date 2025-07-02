<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices_Foods extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_Invoice',
        'ID_Food',
        'Amount',
    ];
}
