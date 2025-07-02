<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'Status',
        'ID_Type',
    ];

    public function type()
    {
        return $this->belongsTo(Types::class);
    }

    public function food()
    {
        return $this->belongsToMany(Foods::class);
    }
}
