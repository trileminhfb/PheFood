<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Workbench\App\Models\User;

class Invoices extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_Table',
        'ID_User',
        'ID_Customer',
        'ID_Sale',
        'Total',
        'Status',
    ];

    public function sale()
    {
        return $this->belongsTo(Sales::class);
    }

    public function food()
    {
        return $this->belongsToMany(Foods::class);
    }

    public function table()
    {
        return $this->hasMany(Tables::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }
}
