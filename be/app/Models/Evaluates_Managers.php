<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluates_Managers extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_User',
        'ID_Evaluate',
        'Comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function evaluate()
    {
        return $this->belongsTo(Evaluates::class);
    }
}
