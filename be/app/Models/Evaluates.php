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

    public function food()
    {
        return $this->belongsTo(Foods::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    public function evaluate_manager()
    {
        return $this->hasOne(Evaluates_Managers::class);
    }
}
