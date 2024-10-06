<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_time',
        'customerID',
    ];

    public function products()
    {
        return $this->belongsToMany(Products::class, 'orderDetail', 'orderID', 'productID')
                    ->withPivot('quantity','totalPrice');
    }

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
