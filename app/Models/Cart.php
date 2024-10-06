<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'totalAmount',
        'totalPrice',
        'customerID',
        'productID',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customerID', 'id');
    }


    public function product()
    {
        return $this->hasMany(Products::class,'id','productID'); // Adjust the foreign key as needed
    }

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
