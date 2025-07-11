<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Functions extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'Code',
    ];

    public function role()
    {
        return $this->belongsToMany(Roles::class);
    }
}
