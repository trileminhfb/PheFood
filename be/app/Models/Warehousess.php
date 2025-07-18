<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouses extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_Ingredient',
        'Amount',
    ];

    public function ingredient()
    {
        return $this->hasMany(Ingredidents::class);
    }
}
