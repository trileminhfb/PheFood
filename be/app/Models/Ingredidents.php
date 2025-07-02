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
}
