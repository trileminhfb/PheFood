<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'Image',
        'ID_Type',
        'BestSeller',
        'Status',
        'Cost',
        'Detail',
    ];
}
