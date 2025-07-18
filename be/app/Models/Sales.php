<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'Start',
        'End',
        'Percent',
        'Status',
    ];

    public function invoice()
    {
        return $this->hasMany(Invoices::class);
    }
}
