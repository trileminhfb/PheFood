<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tables extends Model
{
    use HasFactory;
    protected $fillable = [
        'Number',
        'Status',
        'Amount',
    ];

    public function food()
    {
        return $this->belongsToMany(Foods::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoices::class);
    }
}
