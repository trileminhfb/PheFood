<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles_Functions extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_Role',
        'ID_Function',
    ];
}
