<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluates extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_Food',
        'ID_Customer',
        'Image',
        'Stars',
        'Comment',
    ];
}
