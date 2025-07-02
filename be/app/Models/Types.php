<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'Status',
    ];

    public function food()
    {
        return $this->hasMany(Foods::class);
    }

    public function category()
    {
        return $this->hasMany(Categories::class);
    }
}
